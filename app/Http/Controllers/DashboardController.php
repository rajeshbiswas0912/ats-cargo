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
        $totalRevenue = Order::sum('total_amount');
        $todaysRevenue = Order::whereDate('created_at', Carbon::today())->sum('total_amount');
        $latestEnquirys = Enquiry::where('orderCreated', '0')->latest()->take(5)->get();

        //Bar chart data
        $current_month = Carbon::now()->format('F');
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $rawData = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->pluck('count', 'date');

        // Step 3: Generate all dates of the month with default 0
        $currentDate = $startOfMonth->copy();
        $datesValues = $dataCount = [];

        while ($currentDate <= $endOfMonth) {
            $dateString = $currentDate->toDateString();
            $datesValues[] = Carbon::parse($dateString)->format('d');
            $dataCount[] = $rawData[$dateString] ?? 0;
            $currentDate->addDay();
        }

        return view('dashboard', [
            'totalOrders' => $totalOrders,
            'totalDelivered' => $totalDelivered,
            'todaysOrders' => $todaysOrders,
            'totalRevenue' => $totalRevenue,
            'todaysRevenue' => $todaysRevenue,
            'latestEnquirys' => $latestEnquirys,
            'current_month' => $current_month,
            'datesValues' => $datesValues,
            'dataCount' => $dataCount
        ]);
    }
}