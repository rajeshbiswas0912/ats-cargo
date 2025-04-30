<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\EnquiryPackage;
use App\Models\Order;
use App\Models\OrderPackage;
use App\Models\OrderTracking;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $enquiries = Enquiry::withSum('packages', 'weight')
            ->when($request->search, function ($q) use ($request) {
                $q->where('delivery_name', 'like', '%' . $request->search . '%')
                    ->orWhere('delivery_mobile', 'like', '%' . $request->search . '%');
            })
            ->when($request->from_date, function ($q) use ($request) {
                $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
                $q->whereDate('created_at', '>=', $from_date);
            })
            ->when($request->to_date, function ($q) use ($request) {
                $to_date = Carbon::parse($request->to_date)->format('Y-m-d');
                $q->whereDate('created_at', '<=', $to_date);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('enquiry.index', [
            'enquiries' => $enquiries
        ]);
    }

    public function create()
    {
        return view('enquiry.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                // Sender Details
                'p_name' => 'required|string|max:255',
                'p_pincode' => 'required|digits:6',
                'p_mobile' => 'required|digits_between:10,15',
                'p_address' => 'required|string',

                // Receiver Details
                'd_name' => 'required|string|max:255',
                'd_pincode' => 'required|digits:6',
                'd_mobile' => 'required|digits_between:10,15',
                'd_address' => 'required|string',

                'amount' => 'required|numeric|min:0',
                'payment_type' => 'required|string|in:prepaid,cod',

                // Array Fields
                'material_type' => 'required|array',
                'material_type.*' => 'required|string',

                'no_of_boxes' => 'required|array',
                'no_of_boxes.*' => 'required|integer|min:1',

                'weight' => 'required|array',
                'weight.*' => 'required',

                'height' => 'required|array',
                'height.*' => 'required',

                'length' => 'required|array',
                'length.*' => 'required',

                'width' => 'required|array',
                'width.*' => 'required',
            ], [
                // Custom Messages

                // Sender
                'p_name.required' => 'Pickup name is required.',
                'p_pincode.required' => 'Pickup pincode is required.',
                'p_pincode.digits' => 'Pickup pincode must be 6 digits.',
                'p_mobile.required' => 'Pickup mobile number is required.',
                'p_mobile.digits_between' => 'Pickup mobile number must be between 10 and 15 digits.',
                'p_address.required' => 'Pickup address is required.',

                // Receiver
                'd_name.required' => 'Delivery name is required.',
                'd_pincode.required' => 'Delivery pincode is required.',
                'd_pincode.digits' => 'Delivery pincode must be 6 digits.',
                'd_mobile.required' => 'Delivery mobile number is required.',
                'd_mobile.digits_between' => 'Delivery mobile number must be between 10 and 15 digits.',
                'd_address.required' => 'Delivery address is required.',

                // Array fields
                'material_type.required' => 'Material type is required.',
                'material_type.*.required' => 'Each material type must be specified.',
                'material_type.*.string' => 'Each material type must be a string.',

                'no_of_boxes.required' => 'Number of boxes is required.',
                'no_of_boxes.*.required' => 'Each box count is required.',
                'no_of_boxes.*.integer' => 'Each box count must be an integer.',
                'no_of_boxes.*.min' => 'Each box count must be at least 1.',

                'weight.required' => 'Weight is required.',
                'weight.*.required' => 'Each weight is required.',

                'height.required' => 'Height is required.',
                'height.*.required' => 'Each height is required.',

                'length.required' => 'Length is required.',
                'length.*.required' => 'Each length is required.',

                'width.required' => 'Width is required.',
                'width.*.required' => 'Each width is required.',
            ]);

            DB::beginTransaction();

            $enquiry = Enquiry::create([
                'pickup_name' => $validated['p_name'],
                'pickup_pincode' => $validated['p_pincode'],
                'pickup_mobile' => $validated['p_mobile'],
                'pickup_address' => $validated['p_address'],
                'delivery_name' => $validated['d_name'],
                'delivery_pincode' => $validated['d_pincode'],
                'delivery_mobile' => $validated['d_mobile'],
                'delivery_address' => $validated['d_address'],
                'total_amount' => $validated['amount'],
                'payment_type' => $validated['payment_type']
            ]);

            $count = count($validated['material_type']);
            for ($i = 0; $i < $count; $i++) {
                EnquiryPackage::create([
                    'enquiry_id' => $enquiry->id,
                    'material_type' => $validated['material_type'][$i],
                    'no_of_box' => $validated['no_of_boxes'][$i],
                    'weight' => $validated['weight'][$i],
                    'height' => $validated['height'][$i],
                    'length' => $validated['length'][$i],
                    'width' => $validated['width'][$i]
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Enquiry submitted successfully.');
        } catch (Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function details($id)
    {
        $enquiry = Enquiry::with('packages')->find($id);
        return view('enquiry.details', [
            'enquiry' => $enquiry
        ]);
    }

    public function create_order(Request $request)
    {
        try {
            $validated = $request->validate([
                'enquiry_id' => ['required', 'exists:enquiries,id']
            ]);

            $enquiry = Enquiry::with('packages')->find($validated['enquiry_id']);

            DB::beginTransaction();

            $order = Order::create([
                'pickup_name' => $enquiry->pickup_name,
                'pickup_pincode' => $enquiry->pickup_pincode,
                'pickup_mobile' => $enquiry->pickup_mobile,
                'pickup_address' => $enquiry->pickup_address,
                'delivery_name' => $enquiry->delivery_name,
                'delivery_pincode' => $enquiry->delivery_pincode,
                'delivery_mobile' => $enquiry->delivery_mobile,
                'delivery_address' => $enquiry->delivery_address,
                'total_amount' => $enquiry->total_amount,
                'payment_type' => $enquiry->payment_type
            ]);

            foreach ($enquiry->packages as $package) {
                OrderPackage::create([
                    'order_id' => $order->id,
                    'material_type' => $package->material_type,
                    'no_of_box' => $package->no_of_box,
                    'weight' => $package->weight,
                    'height' => $package->height,
                    'length' => $package->length,
                    'width' => $package->width
                ]);
            }

            OrderTracking::create([
                'order_id' => $order->id,
                'location' => $enquiry->pickup_address
            ]);

            $enquiry->orderCreated = "1";
            $enquiry->update();

            DB::commit();

            return redirect()->back()->with('success', 'Order created successfully.');
        } catch (Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function tracking(Request $request)
    {
        $order = Order::with('tracking', 'packages')->where([
            'tracking_no' => $request->tracking_no
        ])->first();

        return view('enquiry.tracking', [
            'order' => $order
        ]);
    }
}
