<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPackage;
use App\Models\OrderTracking;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::withSum('packages', 'weight')
            ->orderBy('created_at', 'desc')
            ->when($request->search, function ($q) use ($request) {
                $q->where('tracking_no', 'like', '%' . $request->search . '%')
                    ->orWhere('delivery_name', 'like', '%' . $request->search . '%')
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
            ->paginate(10);

        return view('orders.index', ['orders' => $orders]);
    }

    public function create()
    {
        return view('orders.create');
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

                //Price & Payment Details
                'payment_type' => 'required|string|in:prepaid,cod',
                'price' => 'required|numeric|min:0',

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

            $order = Order::create([
                'pickup_name' => $validated['p_name'],
                'pickup_pincode' => $validated['p_pincode'],
                'pickup_mobile' => $validated['p_mobile'],
                'pickup_address' => $validated['p_address'],
                'delivery_name' => $validated['d_name'],
                'delivery_pincode' => $validated['d_pincode'],
                'delivery_mobile' => $validated['d_mobile'],
                'delivery_address' => $validated['d_address'],
                'total_amount' => $validated['price'],
                'payment_type' => $validated['payment_type'],
                'shipping_charge' => $request->shipping_charge,
                'pickup_charge' => $request->pickup_charge,
                'hamali' => $request->hamali,
                'sc_cost' => $request->sc_cost,
                'st_charge' => $request->st_charge,
                'delivery_charge' => $request->delivery_charge,
                'igst' => $request->igst
            ]);

            $count = count($validated['material_type']);
            for ($i = 0; $i < $count; $i++) {
                OrderPackage::create([
                    'order_id' => $order->id,
                    'material_type' => $validated['material_type'][$i],
                    'no_of_box' => $validated['no_of_boxes'][$i],
                    'weight' => $validated['weight'][$i],
                    'height' => $validated['height'][$i],
                    'length' => $validated['length'][$i],
                    'width' => $validated['width'][$i]
                ]);
            }

            OrderTracking::create([
                'order_id' => $order->id,
                'location' => $validated['p_address']
            ]);

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Order created successfully.');
        } catch (Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function show($tracking_no)
    {
        $order = Order::with('packages', 'tracking')->where('tracking_no', $tracking_no)->first();
        return view('orders.show', [
            'order' => $order
        ]);
    }

    public function store_location(Request $request, $order_id)
    {
        try {
            $validated = $request->validate([
                'current_location' => 'required',
            ]);

            OrderTracking::create([
                'order_id' => $order_id,
                'location' => $request->current_location
            ]);

            return redirect()->back()->with('success', 'Location updated successfully.');
        } catch (Exception $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function delete($order_id)
    {
        try {
            DB::beginTransaction();
            Order::find($order_id)->delete();
            OrderPackage::where('order_id', $order_id)->delete();
            OrderTracking::where('order_id', $order_id)->delete();
            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
        } catch (Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function edit(Order $order)
    {
        return view('orders.edit', [
            'order' => $order
        ]);
    }

    public function update(Request $request, Order $order)
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

                //Price & Payment Details
                'payment_type' => 'required|string|in:prepaid,cod',
                'price' => 'required|numeric|min:0',

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

            $tracking = OrderTracking::where([
                'order_id' => $order->id
            ])
                ->first();

            DB::beginTransaction();

            $order->update([
                'pickup_name' => $validated['p_name'],
                'pickup_pincode' => $validated['p_pincode'],
                'pickup_mobile' => $validated['p_mobile'],
                'pickup_address' => $validated['p_address'],
                'delivery_name' => $validated['d_name'],
                'delivery_pincode' => $validated['d_pincode'],
                'delivery_mobile' => $validated['d_mobile'],
                'delivery_address' => $validated['d_address'],
                'total_amount' => $validated['price'],
                'payment_type' => $validated['payment_type'],
                'shipping_charge' => $request->shipping_charge,
                'pickup_charge' => $request->pickup_charge,
                'hamali' => $request->hamali,
                'sc_cost' => $request->sc_cost,
                'st_charge' => $request->st_charge,
                'delivery_charge' => $request->delivery_charge,
                'igst' => $request->igst
            ]);

            OrderPackage::where('order_id', $order->id)->delete();

            $count = count($validated['material_type']);
            for ($i = 0; $i < $count; $i++) {
                OrderPackage::create([
                    'order_id' => $order->id,
                    'material_type' => $validated['material_type'][$i],
                    'no_of_box' => $validated['no_of_boxes'][$i],
                    'weight' => $validated['weight'][$i],
                    'height' => $validated['height'][$i],
                    'length' => $validated['length'][$i],
                    'width' => $validated['width'][$i]
                ]);
            }

            $tracking->update([
                'location' => $validated['p_address']
            ]);

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Order has been updated successfully.');
        } catch (Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function delivered(Request $request, Order $order)
    {
        $order->isDelivered = $request->is_delivered;
        $order->save();

        return redirect()->back()->with('success', 'Order status has been updated successfully.');
    }
}
