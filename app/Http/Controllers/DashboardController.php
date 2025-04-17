<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Order;
use App\Models\OrderPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalDelivered = Order::where('isDelivered', "1")->count();
        $todaysOrders = Order::whereDate('created_at', Carbon::today())->count();
        $totalRevenue = OrderPackage::sum('amount');
        $todaysRevenue = OrderPackage::whereDate('created_at', Carbon::today())->sum('amount');

        $latestEnquirys = Enquiry::where('orderCreated', '0')->latest()->take(5)->get();

        return view('dashboard', [
            'totalOrders' => $totalOrders,
            'totalDelivered' => $totalDelivered,
            'todaysOrders' => $todaysOrders,
            'totalRevenue' => $totalRevenue,
            'todaysRevenue' => $todaysRevenue,
            'latestEnquirys' => $latestEnquirys
        ]);
    }
}
