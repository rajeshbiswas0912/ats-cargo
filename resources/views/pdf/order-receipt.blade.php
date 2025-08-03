<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Courier Consignment Note</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 11px;
      /* slightly reduced */
      margin: 0;
      padding: 0;
    }

    @page {
      size: A4 landscape;
      margin: 10mm;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      table-layout: fixed;
    }

    td {
      border: 1px solid #000;
      padding: 0px 5px 0px 5px;
      /* reduced from 4px */
      vertical-align: top;
      word-wrap: break-word;
      overflow-wrap: break-word;
    }

    .header {
      text-align: center;
    }

    .label {
      font-weight: bold;
    }

    ul {
      margin: 5px 0;
      padding-left: 18px;
    }

    li {
      margin-bottom: 2px;
    }

    input[type="text"] {
      width: 18%;
      font-size: 10px;
    }

    h1 {
      font-size: 16px;
      /* slightly smaller */
      margin: 0;
    }

    span,
    strong {
      font-size: 11px;
    }
  </style>

</head>

<body>
  <table>
    <tr>
      <td colspan="10" style="text-align: center;font-size: 15px;">
        All Subject to Kolkata Jurisdiction</td>
    </tr>
    <tr>
      <td colspan="2" style="width: 15%"><strong>C.N.No.: </strong>{{ $order->tracking_no }}</td>
      <td colspan="4" rowspan="4" class="header" style="width: 55%">
        <?php
        $data = file_get_contents('https://atscargoexpress.com/wp-content/uploads/2025/04/cargo-logo-1024x288.png');
        $base64logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>

        <img src="{{ $base64logo }}" alt="Logo" height="40">
        <br /><br />
        <h1 style="margin: 0;">ATS COURIER CARGO SERVICE</h1> <br />
        28 Ratu Sarkar Lane, Kolkata - 700 073
        <br> Off.-Thakurnagar Bazar, North 24 Parganas, 743287 <br />
        Mobile.: 8436366904/8537828889 | Email: atscouriercargos@gmail.com <br />
        GSTIN: 19BVWPR8378A1ZO
      </td>
      <td colspan="2"><strong>Mode of Transport:</strong> {{ ucfirst($order->mode_of_transport) }}</td>
      <td colspan="2" style="width: 15%"><strong>Date: </strong>
        {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
    </tr>
    <tr>
      <td colspan="2"><strong>From: </strong>{{ $order->pickup_city }}</td>
      <td colspan="2">
        <strong>Freight <br />
          Mode:</strong>
        {{ $order->payment_type }}
      </td>
      <td colspan="2" rowspan="2">
        <span><strong>GST To Be Paid:</span><br>
        <span>Consignor <input type="checkbox" {{ $order->gst_paid_by == 'Consignor' ? 'checked' : null }}
            style="width: 10%; position:relative;top:7px;"></span><br>
        <span>Consignee <input type="checkbox" {{ $order->gst_paid_by == 'Consignee' ? 'checked' : null }}
            style="width: 10%;position:relative;top:7px;"></span><br>
        <span>Transporter <input type="checkbox" {{ $order->gst_paid_by == 'Transpoter' ? 'checked' : null }}
            style="width: 10%;position:relative;top:7px;"></span>
        </strong>
      </td>
    </tr>
    <tr>
      <td colspan="2"><strong>To:</strong> {{ $order->delivery_city }}</td>
      <td colspan="2">
        <strong>Mode of <br />
          Delivery:</strong>
        {{ $order->mode_of_delivery }}
      </td>
    </tr>
    <tr>
      <td colspan="2"><strong>Challan No:</strong> {{ $order->challan_number }}</td>
      <td colspan="4"><strong>Veichle NO:</strong> {{ $order->vehicle_number }}</td>
    </tr>

    <!-- Consignor / Consignee -->
    <tr>
      <td colspan="5"><strong>CONSIGNOR
        </strong>{{ $order->pickup_name }}<br />{{ $order->pickup_address }}<br>
        <span style="text-align: right;">{{ $order->pickup_pincode }}</span><br />Phone / Mobile:
        {{ $order->pickup_mobile }}
      </td>
      <td colspan="5"><strong>CONSIGNEE
        </strong>{{ $order->delivery_name }}<br />{{ $order->delivery_address }}<br>
        <span style="text-align: right;">{{ $order->delivery_pincode }}</span><br />Phone / Mobile:
        {{ $order->delivery_mobile }}
      </td>
    </tr>

    <tr>
      <td style="background: #b1b1f7; color: #060044"><strong>GSTIN NO:</strong></td>
      <td colspan="4">{{ $order->pickup_gst }}</td>
      <td style="background: #b1b1f7; color: #060044"><strong>GSTIN NO:</strong></td>
      <td colspan="4">{{ $order->delivery_gst }}</td>
    </tr>
    <tr>
      <td style="background: #b1b1f7; color: #060044"><strong>PAN NO:</strong></td>
      <td colspan="4">{{ $order->pickup_pan ? $order->pickup_pan : $order->pickup_other_doc }}</td>
      <td style="background: #b1b1f7; color: #060044"><strong>WAY BILL NO:</strong></td>
      <td colspan="4">{{ $order->delivery_eway_bill }}</td>
    </tr>

    <!-- Package Details -->
    <tr class="header">
      <td style="background: #b1b1f7; color: #060044">No. of PKG</td>
      <td style="background: #b1b1f7; color: #060044">
        Method of <br />
        Packing
      </td>
      <td colspan="3" style="background: #b1b1f7; color: #060044">Description (Said to Consignor)</td>
      <td style="background: #b1b1f7; color: #060044">
        VOLUME <br />
        WEIGHT
      </td>
      <td style="background: #b1b1f7; color: #060044">
        ACTUAL <br />
        WEIGHT
      </td>
      <td style="background: #b1b1f7; color: #060044">
        CHARGES <br />
        WEIGHT
      </td>
      <td style="background: #b1b1f7; color: #060044">RATE</td>
      <td style="background: #b1b1f7; color: #060044">
        FREIGHT
      </td>

    </tr>
    <tr>
      <td rowspan="4">{{ $packages->sum('no_of_box') }}</td>
      <td rowspan="4">{{ $packages ? $packages->first()->method_of_packaging : null }}</td>
      <td colspan="3" rowspan="4">{{ $packages ? $packages->first()->material_type : null }}</td>
      <td rowspan="4">{{ $packages->sum('volume_weight') }} KG</td>
      <td rowspan="4">{{ $packages->sum('weight') }} KG</td>
      <td rowspan="4">{{ $packages->sum('charges_weight') }} KG</td>
      <td>{{ $order->price_per_kg }}</td>
      <td>{{ $order->shipping_charge }}</td>

    </tr>
    <tr>
      <td>
        <strong> Pic-up<br />Charge</strong>
      </td>
      <td>{{ $order->pickup_charge }}</td>

    </tr>
    <tr>
      <td><strong>Hamali</strong></td>
      <td>{{ $order->hamali }}</td>

    </tr>
    <tr>
      <td><strong>S/C</strong></td>
      <td>{{ $order->sc_cost }}</td>

    </tr>
    <tr>
      <td rowspan="2" style="background: #b1b1f7;text-align: center; color: #060044"><strong>Invoice <br> No &
          Date</strong></td>
      <td rowspan="2">
        {{ $order->invoice_number }}<br>{{ $order->invoice_date ? \Carbon\Carbon::parse($order->invoice_date)->format('d/m/Y') : null }}
      </td>
      <td colspan="5" style="text-align: center; background: #b1b1f7; color: #060044">
        <strong>AT OWNER RISK/CARRIER'S RISK</strong>
      </td>
      <td style="background: #b1b1f7; color: #060044"><strong>P. Mark</strong></td>
      <td><strong>ST. Charge</strong></td>
      <td>{{ $order->st_charge }}</td>

    </tr>
    <tr>
      <td colspan="5" rowspan="3" style="text-align: left;padding-left: 10px;">
        <span><strong>If Insured, details of Insurance Policy</strong></span><br>
        <span style="text-align: right;">{{ $order->owner_risk }}</span><br>
        <span>Policy No. __________________________</span><br>
        <span>Date. ________________________________</span><br>
        <span>Insurance Company. ____________________</span><br>
        <span>Insurance Value. ______________________</span>
      </td>

      <td rowspan="3">{{ $order->remarks }}</td>
      <td>
        <strong>Delivery Charge</strong>
      </td>
      <td>{{ $order->delivery_charge }}</td>

    </tr>
    <tr>
      <td rowspan="2" style="text-align: center;background: #b1b1f7; color: #060044"><strong>Value <br>
          Declared<br>
          ₹</strong></td>
      <td rowspan="2">{{ $order->total_amount }}</td>
      <td><strong>IGST</strong></td>
      <td>{{ $order->gst_value }}</td>

    </tr>
    <tr>
      <td><strong>TOTAL</strong></td>
      <td>
        {{ $order->sub_total }}
      </td>

    </tr>
    <tr>
      <td colspan="3">
        I/We hereby agree to the terms & Conditions set out on the reversed on
        the Consigner's copy & declare that condition on this way true & correct.<br /><br />
        Name: Consignor's Signature
      </td>
      <td colspan="3" rowspan="2" style="text-align: center; ">
        <strong>Conditions of Carriage</strong>
        <br />
        <ul style="list-style: disc; padding-left: 20px; text-align: left; display: inline-block">
          <li>This is not a negotiable waybill.</li>
          <li>Standard conditions of carriage are on reverse.</li>
          <li>No responsibility for delays, leakages, breakages, and damage.</li>
          <li>Liability is limited to ₹1,000/-</li>
          Any claim should be submitted within 1 month from the date of booking.
        </ul>
        <div style="text-align: left;">

          N.B.: All Complaints should reported within a week.
          Bill must be paid within 15 days os submission otherwise
          interest will charge @15% per annum.
          Please pay by a/c payee cheque/draft only.
          Enclosed signed challan/G.R. copy.
        </div>
      </td>

      <td colspan="4" rowspan="2">RECEIVED ABOVE SHIPMENT IN ORDER AND IN GOOD CONDITION.I/WE HEREBY AGREE
        TO PAY
        ALL CHARGES INCLUDING OCTROI & TAXES AS APPLICABLE.<br><br>
        <span>
          Signature Of Receiver <br>With Rubber Stamp & Date
        </span>
        <span style="border: 1px solid #000;padding: 5px;margin-left: 33px;">{{ $type }} COPY</span>
        <span><img class="qr" src="data:image/png;base64,{{ $qrCode }}" alt="QR code"></span>
      </td>
    </tr>
    <tr>
      <td colspan="3"><span style="margin-right: 20px;">Received By:</span> <span>ATS COURIER CARGO
          SERVICE</span><br>Name__________________ Date ________
        <span style="margin-right: 10px;"></span>
        <span style="margin-right: 10px;">Time__ __</span>
        <span>Sign of Booking Incharge:</span>
        <div>
          <br>
          <b>Bank Details: </b><br>
          HDFC Bank
          Branch: Barasat Road, Habra, North 24 Parganas, West Bengal - 743263
          Account Name: ATS COURIER CARGO SERVICE
          Account Number: 50200079848360 (CA)
          IFSC Code: HDFC0004023, Branch Code: 4023
        </div>

      </td>
    </tr>
    <tr>
      <td colspan="10" style="text-align: center;font-size: 15px;"><strong>FULL TRUCK LOAD ACCEPTED FOR ALL OVER
          INDIA</strong> </td>
    </tr>
  </table>
</body>

</html>
