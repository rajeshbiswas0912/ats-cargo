<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPackage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function download_receipt($id)
    {
        $order = Order::findOrFail($id);
        $packages = OrderPackage::where('order_id', $id)->get();
        $qrPng = QrCode::format('png')
            ->size(100)                 // px
            ->margin(0)                 // optional
            ->generate(
                route('enquiry.tracking', ['tracking_no' => $order->tracking_no])
            );

        // ❷  Convert to base64 so it can live inline inside the HTML
        $qrBase64 = base64_encode($qrPng);
        $pdf = Pdf::loadView('pdf.order-receipt', ['order' => $order, 'packages' => $packages, 'type' => request()->type, 'qrCode' => $qrBase64]);

        return $pdf->download('order-receipt.pdf');
    }

    public function tax_invoice($id)
    {
        $order = Order::findOrFail($id);
        $packages = OrderPackage::where('order_id', $id)->get();
        $stamp = base64_encode(
            file_get_contents(public_path('images/tax-invoice-stamp.jpg'))
        );
        $pdf = Pdf::loadView('pdf.tax-invoice', ['order' => $order, 'packages' => $packages, 'stamp' => $stamp]);

        return $pdf->download('tax-invoice.pdf');
    }
}
