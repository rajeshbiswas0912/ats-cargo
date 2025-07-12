<x-app-layout title="Show Order">
  <div class="section__content section__content--p30 order-details">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Order Details</h3>
            <form action="{{ route('orders.store-location', $order->id) }}" method="POST">
              @csrf
              <div class="d-flex flex-row align-items-center gap-2">
                <div class="form-group">
                  <input type="text" class="form-control" value="{{ $order->tracking_no }}" readonly>
                </div>
                @if (!$order->isDelivered)
                  <div class="form-group">
                    <input type="text" class="form-control" id="current_location" name="current_location"
                      placeholder="Current Location" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Save</button>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
      @include('layouts.includes.alerts')

      <div class="row mb-4">
        <div class="col-lg-12">
          <div class="text-right">
            <a href="{{ route('download-receipt', ['id' => $order->id, 'type' => 'CONSIGNOR']) }}"
              class="btn btn-primary">Consignor</a>
            <a href="{{ route('download-receipt', ['id' => $order->id, 'type' => 'CONSIGNEE']) }}"
              class="btn btn-primary">Consignee</a>
            <a href="{{ route('download-receipt', ['id' => $order->id, 'type' => 'DESTINATION']) }}"
              class="btn btn-primary">Destination</a>
            <a href="{{ route('tax-invoice', ['id' => $order->id]) }}" class="btn btn-primary">Tax Invoice</a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card border">
            <div class="card-header">
              <h4>Pickup Address</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Name</label>
                    <input type="text" class="form-control" id="p_name" name="p_name"
                      value="{{ $order->pickup_name }}" placeholder="Name" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Pincode</label>
                    <input type="text" class="form-control" id="p_pincode" name="p_pincode"
                      value="{{ $order->pickup_pincode }}" placeholder="Pincode" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Mobile
                      Number</label>
                    <input type="text" class="form-control" id="p_mobile" name="p_mobile"
                      value="{{ $order->pickup_mobile }}" placeholder="Mobile Number" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">City</label>
                    <input type="text" class="form-control" id="d_city" name="d_city"
                      value="{{ $order->pickup_city }}" placeholder="City" readonly>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Address</label>
                    <input type="text" class="form-control" id="p_address" name="p_address"
                      value="{{ $order->pickup_address }}" placeholder="Address" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">GST Number</label>
                    <input type="text" class="form-control" id="d_gst_no" name="d_gst_no"
                      value="{{ $order->pickup_gst }}" placeholder="GST Number" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">PAN
                      Number</label>
                    <input type="text" class="form-control" id="p_pan_no" name="p_pan_no"
                      value="{{ $order->pickup_pan }}" placeholder="PAN Number" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Other Document
                      Number</label>
                    <input type="text" class="form-control" id="p_other_doc_no" name="p_other_doc_no"
                      value="{{ $order->pickup_other_doc }}" placeholder="Other Document Number" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card border">
            <div class="card-header">
              <h4>Delivery Address</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Name</label>
                    <input type="text" class="form-control" id="d_name" name="d_name"
                      value="{{ $order->delivery_name }}" placeholder="Name" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Pincode</label>
                    <input type="text" class="form-control" id="d_pincode" name="d_pincode"
                      value="{{ $order->delivery_pincode }}" placeholder="Pincode" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Mobile
                      Number</label>
                    <input type="text" class="form-control" id="d_mobile" name="d_mobile"
                      value="{{ $order->delivery_mobile }}" placeholder="Mobile Number" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">City</label>
                    <input type="text" class="form-control" id="d_city" name="d_city"
                      value="{{ $order->delivery_city }}" placeholder="City" readonly>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Address</label>
                    <input type="text" class="form-control" id="d_address" name="d_address"
                      value="{{ $order->delivery_address }}" placeholder="Address" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">GST
                      Number</label>
                    <input type="text" class="form-control" id="d_gst_no" name="d_gst_no"
                      value="{{ $order->delivery_gst }}" placeholder="GST Number" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">EWAY Bill
                      Number</label>
                    <input type="text" class="form-control" id="eway_bill_no" name="eway_bill_no"
                      value="{{ $order->delivery_eway_bill }}" placeholder="EWAY Bill Number" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card border">
            <div class="card-header">
              <h4>Package Details</h4>
            </div>
            <div class="card-body">
              <div class="packages">
                @if ($order->packages->isNotEmpty())
                  @foreach ($order->packages as $key => $package)
                    <div class="row">
                      <div class="col-lg-12">
                        <h5>Package {{ $key + 1 }}</h5>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-label" for="" style="color: black; font-size: 15px;">Material
                            Type</label>
                          <input type="text" class="form-control" id="material_type" name="material_type[]"
                            placeholder="Material type" value="{{ $package->material_type }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-label" for="" style="color: black; font-size: 15px;">No of
                            boxes</label>
                          <input type="text" class="form-control" id="no_of_boxes" name="no_of_boxes[]"
                            placeholder="No of boxes" value="{{ $package->no_of_box }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-label" for=""
                            style="color: black; font-size: 15px;">Weight</label>
                          <input type="text" class="form-control" id="weight" name="weight[]"
                            placeholder="Weight" value="{{ $package->weight }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label class="form-label" for="" style="color: black; font-size: 15px;">Method of
                            Packing</label>
                          <input type="text" class="form-control" id="method_of_packing"
                            name="method_of_packing[]" placeholder="Method of Packing"
                            value="{{ $package->method_of_packaging }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-label" for="" style="color: black; font-size: 15px;">Height
                            (cm)
                          </label>
                          <input type="text" class="form-control" id="height" name="height[]"
                            placeholder="Height" value="{{ $package->height }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-label" for="" style="color: black; font-size: 15px;">Length
                            (cm)</label>
                          <input type="text" class="form-control" id="length" name="length[]"
                            placeholder="Length" value="{{ $package->length }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-label" for="" style="color: black; font-size: 15px;">Width
                            (cm)</label>
                          <input type="text" class="form-control" id="width" name="width[]"
                            placeholder="Width" value="{{ $package->weight }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-label" for="" style="color: black; font-size: 15px;">Volume
                            Weight</label>
                          <input type="number" class="form-control" id="volume_weight" name="volume_weight[]"
                            placeholder="Volume Weight" value="{{ $package->volume_weight }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-label" for="" style="color: black; font-size: 15px;">Charges
                            Weight</label>
                          <input type="number" class="form-control" id="charges_weight" name="charges_weight[]"
                            placeholder="Charges Weight" value="{{ $package->charges_weight }}" readonly>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card border">
            <div class="card-header">
              <h4>Material Value & Bill Type</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Material
                      Value</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                      value="{{ $order->total_amount }}" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Invoice
                      Number</label>
                    <input type="text" class="form-control" id="invoice_no" name="invoice_no"
                      placeholder="Invoice Number" readonly value="{{ $order->invoice_number }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Invoice
                      Date</label>
                    <input type="text" class="form-control" id="invoice_date" name="invoice_date"
                      placeholder="Invoice Date" readonly
                      value="{{ \Carbon\Carbon::parse($order->invoice_date)->format('d-m-Y') }}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card border">
            <div class="card-header">
              <h4>Shipping Details</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Price Per
                      KG</label>
                    <input type="number" class="form-control" id="price_per_kg" name="price_per_kg"
                      placeholder="Price Per KG" readonly value="{{ $order->price_per_kg }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Shipping
                      Price</label>
                    <input type="number" class="form-control" id="shipping_charge" name="shipping_charge"
                      placeholder="Shipping Price" value="{{ $order->shipping_charge }}" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Pickup
                      Charge</label>
                    <input type="number" class="form-control" id="pickup_charge" name="pickup_charge"
                      placeholder="Pickup Charge" value="{{ $order->pickup_charge }}" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Hamali</label>
                    <input type="number" class="form-control" id="hamali" name="hamali" placeholder="Hamali"
                      value="{{ $order->hamali }}" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">S/C</label>
                    <input type="number" class="form-control" id="sc_cost" name="sc_cost" placeholder="S/C"
                      value="{{ $order->sc_cost }}" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">ST.
                      Charge</label>
                    <input type="number" class="form-control" id="st_charge" name="st_charge"
                      placeholder="ST. Charge" value="{{ $order->st_charge }}" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Delivery
                      Charge</label>
                    <input type="number" class="form-control" id="delivery_charge" name="delivery_charge"
                      placeholder="Delivery Charge" value="{{ $order->delivery_charge }}" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">IGST</label>
                    <input type="text" class="form-control" id="igst" name="igst" placeholder="IGST"
                      value="{{ $order->igst }}%" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">IGST
                      Value</label>
                    <input type="number" class="form-control" id="gst_value" name="gst_value"
                      placeholder="IGST Value" value="{{ $order->gst_value }}" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Total</label>
                    <input type="number" class="form-control" id="total" name="total" placeholder="Total"
                      readonly value="{{ $order->sub_total }}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card border">
            <div class="card-header">
              <h4>Delivery Type</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Mode of
                      Transport</label>
                    <input type="text" class="form-control" id="price_per_kg" name="price_per_kg"
                      placeholder="Mode of Transport" readonly value="{{ ucfirst($order->mode_of_transport) }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Payment
                      Type</label>
                    <input type="text" class="form-control" id="price_per_kg" name="price_per_kg"
                      placeholder="Payment Type" readonly value="{{ $order->payment_type }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Mode of
                      Delivery</label>
                    <input type="text" class="form-control" id="price_per_kg" name="price_per_kg"
                      placeholder="Mode of Delivery" readonly value="{{ $order->mode_of_delivery }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">GST Paid
                      By</label>
                    <input type="text" class="form-control" id="price_per_kg" name="price_per_kg"
                      placeholder="GST Paid By" readonly value="{{ $order->gst_paid_by }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Vehicle
                      Number</label>
                    <input type="text" class="form-control" id="vehicle_no" name="vehicle_no"
                      placeholder="Vehicle Number" readonly value="{{ $order->vehicle_number }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Challan
                      Number</label>
                    <input type="text" class="form-control" id="challan_no" name="challan_no"
                      placeholder="Challan Number" readonly value="{{ $order->challan_number }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Owner
                      Risk/Carrier Risk</label>
                    <input type="text" class="form-control" id="challan_no" name="challan_no"
                      placeholder="Owner Risk/Carrier Risk" readonly value="{{ $order->owner_risk }}">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-label" for="" style="color: black; font-size: 15px;">Remarks</label>
                    <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks" readonly>{{ $order->remarks }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @if ($order->tracking->isNotEmpty())
        <div class="row">
          @foreach ($order->tracking as $track)
            <div class="col-lg-3">
              <div class="card border">
                <div class="card-body">
                  <div>{{ $track->location }}</div>
                  <div>{{ \Carbon\Carbon::parse($track->created_at)->format('d M Y h:i A') }}</div>
                </div>
              </div>
            </div>
          @endforeach
          @if ($order->isDelivered)
            <div class="col-lg-3">
              <div class="card border">
                <div class="card-body">
                  <h4>Delivered</h4>
                  <div>{{ \Carbon\Carbon::parse($order->updated_at)->format('d M Y h:i A') }}</div>
                </div>
              </div>
            </div>
          @endif
        </div>
      @endif

    </div>
  </div>

  @push('scripts')
    <script>
      $(document).ready(function() {

      });

      $(document).on('click', '.add_more_package', function() {
        let count = Number($(this).attr('data-count-row'));
        count++;
        let html = `<div class="row other_packages_${count}">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="material_type[]"
                            placeholder="Material type">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="no_of_boxes[]"
                            placeholder="No of boxes">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="weight[]"
                            placeholder="Weight">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control" name="height[]"
                            placeholder="Height">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control" name="length[]"
                            placeholder="Length">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control" name="width[]"
                            placeholder="Width">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="amount[]"
                            placeholder="Amount / Value">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <select name="payment_type[]" class="form-control">
                            <option value="0">Please select</option>
                            <option value="prepaid">Prepaid</option>
                            <option value="cod">Cash on delivery</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-4 other_packages_${count}">
                      <div class="col-lg-12 text-right">
                        <button type="button" class="btn btn-danger remove_more_package" data-row-index="${count}">Remove</button>
                      </div>
                    </div>`;

        $('.packages').append(html);
        $(this).attr('data-count-row', count);
      });

      $(document).on('click', '.remove_more_package', function() {
        let rowIndex = Number($(this).attr('data-row-index'));
        $(`.other_packages_${rowIndex}`).remove();
      });
    </script>
  @endpush
</x-app-layout>
