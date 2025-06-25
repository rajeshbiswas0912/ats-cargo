<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPackage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function download_receipt($id)
    {
        $order = Order::findOrFail($id);
        $packages = OrderPackage::where('order_id', $id)->get();
        $pdf = Pdf::loadView('pdf.order-receipt', ['order' => $order, 'packages' => $packages, 'type' => request()->type]);

        return $pdf->download('order-receipt.pdf');
    }
}
