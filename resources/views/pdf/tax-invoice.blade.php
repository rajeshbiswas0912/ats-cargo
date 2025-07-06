<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tax Invoice</title>


  <style>
    * {
      margin: 0;
      padding: 0;
    }

    table,
    td {
      border-collapse: collapse;
    }
  </style>


</head>

<body>
  <table style="margin: 0 auto; font-family: sans-serif; width: 800px; color: #000; border: 1px solid #000;">
    <tr>
      <td colspan="10" style="height: 10px; width: 100%;">
      </td>
    </tr>
    <tr>
      <td colspan="10">
        <h6 style="text-align: center; font-weight: bold; padding-bottom: 5px; font-size: 18px;">Tax Invoice</h6>
        <h1 style="text-align: center; font-size: 32px; padding-bottom: 5px;">ATS COURIER CARGO SERVICE</h1>
        <p style="text-align: center; font-size: 16px;">34/1 Ratu Sarkar Lane, Kolkata - 700073</p>
      </td>
    </tr>
    <tr>
      <td colspan="4" style="padding: 0 5px;">
        <p style="text-align: right; font-size: 16px;">Mob:8436366904</p>
      </td>
      <td colspan="6" style="padding: 0 5px;">
        <p style="text-align: left; font-size: 16px;">Email: anjali.transport2017@gmail.com</p>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="padding: 0 5px;">
      </td>
      <td colspan="3" style="padding: 0 5px;">
        <p style="text-align: center; font-size: 15px; font-weight: bold;">PAN NO: BVWPR8378A</p>
      </td>
      <td colspan="5" style="padding: 0 5px;">
        <p style="text-align: left; font-size: 15px; font-weight: bold;">GSTIN: 19BVWPR8378A1ZO</p>
      </td>
    </tr>

    <tr>
      <td colspan="10" style="height: 3px; width: 100%;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 1px; width: 100%; background-color: #000;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 3px; width: 100%;">
      </td>
    </tr>

    <tr>
      <td colspan="7"></td>
      <td colspan="3">
        <p style="text-align: left; font-size: 16px; font-weight: bold;">Bill No.
          ATS/{{ \Str::padLeft(\Str::substr($order->tracking_no, -1, 5), 3, '0') }}</p>
        <p style="text-align: left; font-size: 16px; font-weight: bold;">Date:
          {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
      </td>
    </tr>

    <tr>
      <td colspan="10" style="height: 3px; width: 100%;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 1px; width: 100%; background-color: #000;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 3px; width: 100%;">
      </td>
    </tr>

    <tr>
      <td colspan="2">
        <h6 style="font-weight: bold; font-size: 14px;">Messer's </h6>
      </td>
      <td colspan="4">
        <h4 style="font-weight: bold; font-size: 15px;">{{ $order->delivery_name }}</h4>
        <ul style="list-style-type: none;padding: 0;">
          <li style="font-size: 14px; font-weight: bold;">{{ $order->delivery_address }}</li>
          {{-- <li style="font-size: 14px; font-weight: bold;">GEORGES GATE ROAD, HASTING</li> --}}
          <li style="font-size: 14px; font-weight: bold;">{{ $order->delivery_city }} - {{ $order->delivery_pincode }}
          </li>
        </ul>
      </td>
      <td colspan="4">
        <ul style="list-style-type: none;padding: 0; border: 2px solid #000; padding: 5px;">
          <li style="font-size: 14px; font-weight: bold;"> GSTIN: {{ $order->delivery_gst }}</li>
          <li style="font-size: 14px; font-weight: bold;"></li>
          <li style="font-size: 14px; font-weight: bold;">STATE CODE: </li>
        </ul>
      </td>
    </tr>

    <tr>
      <td colspan="10" style="height: 30px; width: 100%;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 1px; width: 100%; background-color: #000;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 3px; width: 100%;">
      </td>
    </tr>

    <tr>
      <td colspan="10">
        <p style="font-size: 14px;">Being Transportation Charges for Carrying your Material as per Details Given Below:
        </p>
      </td>
    </tr>

    <tr>
      <td colspan="10" style="height: 3px; width: 100%;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 1px; width: 100%; background-color: #000;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 15px; width: 100%;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 3px; width: 100%;">
      </td>
    </tr>
    <tr>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px; text-align: center;">CN NO.
      </td>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px;">DATE</td>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px;" colspan="2">
        <ul style="list-style: none;">
          <li>YOUR INV NO.</li>
          <li>PARTICULARS</li>
        </ul>

      </td>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px; text-align: center;">
        <ul style="list-style: none;">
          <li>FROM</li>
          <li>LORRY NO.</li>
        </ul>
      </td>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px; text-align: center;">TO.
      </td>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px; text-align: center;">PKGS.
      </td>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px; text-align: center;">WEIGHT
      </td>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px; text-align: center;">RATE
      </td>
      <td style=" border: 1px solid #000; font-size: 14px; font-weight: bold; padding: 5px; text-align: center;">
        <ul style="list-style: none;">
          <li>AMOUNT</li>
          <li>RS. P.</li>
        </ul>

      </td>
    </tr>

    <tr>
      <td colspan="10" style="height: 10px; width: 100%;">
      </td>
    </tr>

    <tr>
      <td style="font-size: 14px;">{{ $order->challan_number }}</td>
      <td style="font-size: 14px;">{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
      <td style="font-size: 12px;" colspan="2">
        <ul style="list-style-type: none;padding: 0;">
          <li></li>
          <li></li>
        </ul>
      </td>
      <td style="font-size: 12px;">
        <ul style="list-style-type: none;padding: 0;">
          <li>{{ $order->pickup_city }}</li>
          <li>{{ $order->vehicle_number }}</li>
        </ul>
      </td>
      <td style="font-size: 14px;">{{ $order->delivery_city }}</td>
      <td style="font-size: 14px; text-align: right;">{{ $packages->sum('no_of_box') }}</td>
      <td style="font-size: 14px;">{{ $packages->sum('volume_weight') }} KG</td>
      <td style="font-size: 14px;">{{ $order->price_per_kg }}</td>
      <td style="font-size: 14px;">{{ $order->shipping_charge }}</td>
    </tr>

    <tr>
      <td colspan="10" style="height: 20px; width: 100%;">
      </td>
    </tr>

    <tr>
      <td colspan="2">
      </td>
      <td colspan="8">
        <p style=" font-size: 10px;">**WELFRAC SERVICES**</p>
      </td>
    </tr>

    <tr>
      <td colspan="10" style="height: 1px; width: 100%; background-color: #000;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 3px; width: 100%;">
      </td>
    </tr>

    <tr>
      <td colspan="1">
      </td>
      <td colspan="5">
        <ul style="padding: 0; list-style: none;">
          <li style="font-size: 15px;">1. Transportation Charges. </li>
          <li style="font-size: 14px;">2. Consigment Charges.</li>
          <li style="font-size: 14px;">3. CGST Charges. @ {{ $order->igst / 2 }}% </li>
          <li style="font-size: 14px;">4. SGST Charges. @ {{ $order->igst / 2 }}% </li>
          <li style="font-size: 14px;">5. IGST Charges. @ {{ $order->igst }}% </li>
          <li style="font-size: 14px;">6. Extra expenses. DETENTION CHARGES/ 4 DAYS </li>
        </ul>
      </td>
      <td colspan="4">
        <ul style="list-style-type: none;padding: 0; text-align: right;">
          <li style="font-weight: bold;  font-size: 14px;"> {{ $order->shipping_charge }}</li>
          <li style="font-weight: bold;  font-size: 14px;">0.00</li>
          <li style="font-weight: bold;  font-size: 14px;">0.00</li>
          <li style="font-weight: bold;  font-size: 14px;">0.00</li>
          <li style="font-weight: bold;  font-size: 14px;">0.00</li>
          <li style="font-weight: bold;  font-size: 14px;">0.00</li>
        </ul>
      </td>
    </tr>

    <tr>
      <td colspan="10" style="height: 30px; width: 100%;">
      </td>
    </tr>
    <tr>
      <td colspan="1">
      </td>
      <td colspan="9">
        <p style="text-align: left; padding-bottom: 5px; font-size: 14px; text-decoration: underline;">GST PAID BY
          CENOSPHERE INDIA PVT. LIMITED</p>
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 5px; width: 100%;">
      </td>
    </tr>


    <tr>
      <td colspan="6"
        style="font-weight: bold; font-size: 16px; text-align: center; border: 1px solid #000; padding: 10px 0px;">
        <h5>GRAND TOTAL==> {{ \Str::upper(\Number::spell($order->sub_total, locale: 'en')) }}</h5>
      </td>
      <td style="font-weight: bold; font-size: 14px; border: 1px solid #000; padding: 20px 0 0 0; text-align: right;">
        {{ $packages->sum('no_of_box') }} </td>
      <td
        style="font-weight: bold; font-size: 14px;  text-align: center; border: 1px solid #000; padding: 20px 0 0 0;">
        {{ $packages->sum('volume_weight') }} KG</td>
      <td style="font-weight: bold; font-size: 14px; border: 1px solid #000; padding: 20px 0 0 0; text-align: center;">
        {{ $order->price_per_kg }}</td>
      <td style="font-weight: bold; font-size: 14px; border: 1px solid #000; padding: 20px 0 0 0; text-align: center;">
        {{ $order->sub_total }}</td>
    </tr>
    <tr>
      <td colspan="10" style="height: 5px; width: 100%;">
      </td>
    </tr>

    <tr>
      <td colspan="1">
      </td>
      <td colspan="5">
        <ul style="list-style-type: none;">
          <li>Taxable Value for the Purpose of GST Rs. {{ $order->sub_total }}</li>
          <li>Please Pay by A/C payee / Cheque.</li>
        </ul>
      </td>
      <td colspan="4" style="text-align: center;">
        <h4>E.&.O.E.</h4>
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 5px; width: 100%;">
      </td>
    </tr>

    <tr>
      <td colspan="1">
      </td>
      <td colspan="5">
        <ul style="list-style-type: none;">
          <li>Advance pay : </li>
          <li>
            <h4>Balance DUE: </h4>
          </li>
        </ul>
      </td>
      <td colspan="4" style="text-align: center;">
        <img src="data:image/png;base64,{{ $stamp }}" alt="Tax Invoice Stamp">
      </td>
    </tr>

    <tr>
      <td colspan="1">
      </td>
      <td colspan="4">
        <p>Encl</p>
      </td>
      <td colspan="5" style="text-align: center;">
        <h4>ATS COURIER CARGO SERVICE</h4>
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 1px; width: 100%; background-color: #000;">
      </td>
    </tr>
    <tr>
      <td colspan="10" style="height: 10px; width: 100%;">
      </td>
    </tr>

  </table>
</body>

</html>
