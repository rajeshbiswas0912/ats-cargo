<x-app-layout title="Edit Order">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Edit Order</h3>
            <div>
              <form action="{{ route('orders.delivered', $order->id) }}" method="POST">
                @csrf
                <label for="" class="form-label">Is Delivered?</label>
                <select name="is_delivered" id="" class="form-select" required>
                  <option value="0" {{ $order->isDelivered == '0' ? 'selected' : null }}>No</option>
                  <option value="1" {{ $order->isDelivered == '1' ? 'selected' : null }}>Yes</option>
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @include('layouts.includes.alerts')
      <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
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
                        value="{{ $order->pickup_name }}" placeholder="Name">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Pincode</label>
                      <input type="number" class="form-control" id="p_pincode" name="p_pincode"
                        value="{{ $order->pickup_pincode }}" placeholder="Pincode">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Mobile
                        Number</label>
                      <input type="number" class="form-control" id="p_mobile" name="p_mobile"
                        value="{{ $order->pickup_mobile }}" placeholder="Mobile Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">City</label>
                      <input type="text" class="form-control" id="p_city" name="p_city"
                        value="{{ $order->pickup_city }}" placeholder="City" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Address</label>
                      <input type="text" class="form-control" id="p_address" name="p_address"
                        value="{{ $order->pickup_address }}" placeholder="Address">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">GST Number</label>
                      <input type="text" class="form-control" id="p_gst_no" name="p_gst_no"
                        value="{{ $order->pickup_gst }}" placeholder="GST Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">PAN
                        Number</label>
                      <input type="text" class="form-control" id="p_pan_no" name="p_pan_no"
                        value="{{ $order->pickup_pan }}" placeholder="PAN Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Other Document
                        Number</label>
                      <input type="text" class="form-control" id="p_other_doc_no" name="p_other_doc_no"
                        value="{{ $order->pickup_other_doc }}" placeholder="Other Document Number">
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
                        value="{{ $order->delivery_name }}" placeholder="Name">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Pincode</label>
                      <input type="number" class="form-control" id="d_pincode" name="d_pincode"
                        value="{{ $order->delivery_pincode }}" placeholder="Pincode">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Mobile
                        Number</label>
                      <input type="number" class="form-control" id="d_mobile" name="d_mobile"
                        value="{{ $order->delivery_mobile }}" placeholder="Mobile Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">City</label>
                      <input type="text" class="form-control" id="d_city" name="d_city"
                        value="{{ $order->delivery_city }}" placeholder="City" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Address</label>
                      <input type="text" class="form-control" id="d_address" name="d_address"
                        value="{{ $order->delivery_address }}" placeholder="Address">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">GST
                        Number</label>
                      <input type="text" class="form-control" id="d_gst_no" name="d_gst_no"
                        value="{{ $order->delivery_gst }}" placeholder="GST Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">EWAY Bill
                        Number</label>
                      <input type="text" class="form-control" id="eway_bill_no" name="eway_bill_no"
                        value="{{ $order->delivery_eway_bill }}" placeholder="EWAY Bill Number">
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
              <div class="card-body" id="package_details">
                <div class="packages">
                  @if ($order->packages->isNotEmpty())
                    @foreach ($order->packages as $key => $item)
                      @php
                        $key++;
                      @endphp
                      <div class="row {{ $key > 1 ? 'other_packages_' . $key : null }}">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label class="form-label" for="" style="color: black; font-size: 15px;">Material
                              type</label>
                            <input type="text" class="form-control" id="material_type" name="material_type[]"
                              placeholder="Material type" value="{{ $item->material_type }}">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label class="form-label" for="" style="color: black; font-size: 15px;">No of
                              boxes</label>
                            <input type="number" class="form-control" id="no_of_boxes" name="no_of_boxes[]"
                              placeholder="No of boxes" value="{{ $item->no_of_box }}">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label class="form-label" for=""
                              style="color: black; font-size: 15px;">Weight</label>
                            <input type="number" class="form-control charge" id="weight" name="weight[]"
                              placeholder="Weight" value="{{ $item->weight }}">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label class="form-label" for="" style="color: black; font-size: 15px;">Method of
                              Packing</label>
                            <input type="text" class="form-control" id="method_of_packing"
                              name="method_of_packing[]" placeholder="Method of Packing"
                              value="{{ $item->method_of_packaging }}" required>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label class="form-label" for="" style="color: black; font-size: 15px;">Height
                              (cm)
                            </label>
                            <input type="number" class="form-control" id="height" name="height[]"
                              placeholder="Height (cm)" value="{{ $item->height }}">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label class="form-label" for="" style="color: black; font-size: 15px;">Length
                              (cm)</label>
                            <input type="number" class="form-control" id="length" name="length[]"
                              placeholder="Length (cm)" value="{{ $item->length }}">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label class="form-label" for="" style="color: black; font-size: 15px;">Width
                              (cm)</label>
                            <input type="number" class="form-control" id="width" name="width[]"
                              placeholder="Width (cm)" value="{{ $item->width }}">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label class="form-label" for="" style="color: black; font-size: 15px;">Volume
                              Weight</label>
                            <input type="number" class="form-control" id="volume_weight" name="volume_weight[]"
                              placeholder="Volume Weight" value="{{ $item->volume_weight }}">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label class="form-label" for="" style="color: black; font-size: 15px;">Charges
                              Weight</label>
                            <input type="number" class="form-control" id="charges_weight" name="charges_weight[]"
                              placeholder="Charges Weight" value="{{ $item->charges_weight }}">
                          </div>
                        </div>
                      </div>

                      @if ($key > 1)
                        <div class="row mb-4 other_packages_{{ $key }}">
                          <div class="col-lg-12 text-right">
                            <button type="button" class="btn btn-danger remove_more_package"
                              data-row-index={{ $key }}>Remove</button>
                          </div>
                        </div>
                      @endif
                    @endforeach
                  @endif

                  <div class="row mb-4">
                    <div class="col-lg-12 text-right">
                      <button type="button" class="btn btn-primary add_more_package"
                        data-count-row={{ count($order->packages) }}>Add one
                        more</button>
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
                <h4>Material Value & Bill Type</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Price</label>
                      <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                        value="{{ $order->total_amount }}" required>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Invoice
                        Number</label>
                      <input type="text" class="form-control" id="invoice_no" name="invoice_no"
                        placeholder="Invoice Number" required value="{{ $order->invoice_number }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Invoice
                        Date</label>
                      <input type="date" class="form-control" id="invoice_date" name="invoice_date"
                        placeholder="Invoice Date" required value="{{ $order->invoice_date }}">
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
              <div class="card-body" id="shipping_details">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Price Per
                        KG</label>
                      <input type="number" class="form-control" id="price_per_kg" name="price_per_kg"
                        placeholder="Price Per KG" required value="{{ $order->price_per_kg }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Shipping
                        Price</label>
                      <input type="number" class="form-control charge" id="shipping_charge" name="shipping_charge"
                        placeholder="Shipping Price" value="{{ $order->shipping_charge }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Pickup
                        Charge</label>
                      <input type="number" class="form-control charge" id="pickup_charge" name="pickup_charge"
                        placeholder="Pickup Charge" value="{{ $order->pickup_charge }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Hamali</label>
                      <input type="number" class="form-control charge" id="hamali" name="hamali"
                        placeholder="Hamali" value="{{ $order->hamali }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">S/C</label>
                      <input type="number" class="form-control charge" id="sc_cost" name="sc_cost"
                        placeholder="S/C" value="{{ $order->sc_cost }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">ST.
                        Charge</label>
                      <input type="number" class="form-control charge" id="st_charge" name="st_charge"
                        placeholder="ST. Charge" value="{{ $order->st_charge }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Delivery
                        Charge</label>
                      <input type="number" class="form-control charge" id="delivery_charge" name="delivery_charge"
                        placeholder="Delivery Charge" value="{{ $order->delivery_charge }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">IGST</label>
                      <select name="igst" id="igst" class="form-control">
                        <option value="">IGST</option>
                        <option value="5" {{ $order->igst == 5 ? 'selected' : '' }}>5%</option>
                        <option value="12" {{ $order->igst == 12 ? 'selected' : '' }}>12%</option>
                        <option value="18" {{ $order->igst == 18 ? 'selected' : '' }}>18%</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Total</label>
                      <input type="number" class="form-control" id="total" name="total" placeholder="Total"
                        value="{{ $order->sub_total }}">
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
                      <select name="mode_of_transport" id="mode_of_transport" class="form-control" required>
                        <option value="">Mode of Transport</option>
                        <option value="road" {{ $order->mode_of_transport == 'road' ? 'selected' : null }}>Road
                        </option>
                        <option value="rail" {{ $order->mode_of_transport == 'rail' ? 'selected' : null }}>Rail
                        </option>
                        <option value="air" {{ $order->mode_of_transport == 'air' ? 'selected' : null }}>Air
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Payment
                        Type</label>
                      <select name="payment_type" id="payment_type" class="form-control" required>
                        <option value="">Payment Type</option>
                        <option value="Prepaid" {{ $order->payment_type == 'Prepaid' ? 'selected' : null }}>Prepaid
                        </option>
                        <option value="Cash On" {{ $order->payment_type == 'Cash On' ? 'selected' : null }}>Cash On
                        </option>
                        <option value="To Be Bill" {{ $order->payment_type == 'To Be Bill' ? 'selected' : null }}>To
                          Be Bill</option>
                        <option value="Freight on Delivery"
                          {{ $order->payment_type == 'Freight on Delivery' ? 'selected' : null }}>Freight on Delivery
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Mode of
                        Delivery</label>
                      <select name="mode_of_delivery" id="mode_of_delivery" class="form-control" required>
                        <option value="">Mode of Delivery</option>
                        <option value="Door to Door"
                          {{ $order->mode_of_delivery == 'Door to Door' ? 'selected' : null }}>Door to Door</option>
                        <option value="Godown to Door"
                          {{ $order->mode_of_delivery == 'Godown to Door' ? 'selected' : null }}>Godown to Door
                        </option>
                        <option value="Godown to Godown"
                          {{ $order->mode_of_delivery == 'Godown to Godown' ? 'selected' : null }}>Godown to Godown
                        </option>
                        <option value="Door to Godown"
                          {{ $order->mode_of_delivery == 'Door to Godown' ? 'selected' : null }}>Door to Godown
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">GST Paid
                        By</label>
                      <select name="gst_paid_by" id="gst_paid_by" class="form-control">
                        <option value="">GST Paid By</option>
                        <option value="Consignor" {{ $order->gst_paid_by == 'Consignor' ? 'selected' : null }}>
                          Consignor</option>
                        <option value="Consignee" {{ $order->gst_paid_by == 'Consignee' ? 'selected' : null }}>
                          Consignee</option>
                        <option value="Transpoter" {{ $order->gst_paid_by == 'Transpoter' ? 'selected' : null }}>
                          Transpoter</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Vehicle
                        Number</label>
                      <input type="text" class="form-control" id="vehicle_no" name="vehicle_no"
                        placeholder="Vehicle Number" value="{{ $order->vehicle_number }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Challan
                        Number</label>
                      <input type="text" class="form-control" id="challan_no" name="challan_no"
                        placeholder="Challan Number" value="{{ $order->challan_number }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Owner
                        Risk/Carrier Risk</label>
                      <select name="owner_risk_carrier_risk" id="owner_risk_carrier_risk" class="form-control">
                        <option value="">Owner Risk/Carrier Risk</option>
                        <option value="Yes" {{ $order->owner_risk == 'Yes' ? 'selected' : null }}>Yes</option>
                        <option value="No" {{ $order->owner_risk == 'No' ? 'selected' : null }}>No</option>
                        <option value="O/R" {{ $order->owner_risk == 'O/R' ? 'selected' : null }}>O/R</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Remarks</label>
                      <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks">{{ $order->remarks }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
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
                          <input type="number" class="form-control" name="no_of_boxes[]"
                            placeholder="No of boxes">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <input type="number" class="form-control charge" name="weight[]"
                            placeholder="Weight">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="number" class="form-control" name="height[]"
                            placeholder="Height (cm)">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="number" class="form-control" name="length[]"
                            placeholder="Length (cm)">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="number" class="form-control" name="width[]"
                            placeholder="Width (cm)">
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

      document.addEventListener('DOMContentLoaded', () => {
        const chargeFields = document.querySelectorAll('#shipping_details .charge');
        const igstSelect = document.getElementById('igst');
        const totalField = document.getElementById('total');
        const materialValue = document.getElementById('price');
        const pricePerKgInput = document.getElementById('price_per_kg');

        function calculateTotal() {
          // 1️⃣ Add up all numeric fields
          let subtotal = 0;
          chargeFields.forEach(el => {
            subtotal += parseFloat(el.value) || 0; // treat blanks as 0
          });

          // 2️⃣ Apply IGST percentage
          const igstRate = parseFloat(igstSelect.value) || 0;
          const igstAmount = parseFloat(materialValue.value) * igstRate / 100;
          console.log(igstAmount);

          let totalWeight = 0;
          document.querySelectorAll('input[name="weight[]"]').forEach(w => {
            totalWeight += parseFloat(w.value) || 0;
          });

          const pricePerKg = parseFloat(pricePerKgInput.value) || 0;
          const materialCost = pricePerKg * totalWeight;

          // 3️⃣ Final total (rounded to 2 decimals)
          totalField.value = (subtotal + igstAmount + materialCost).toFixed(2);
        }

        // Recalculate whenever the user types or changes a value
        chargeFields.forEach(el => el.addEventListener('input', calculateTotal));
        pricePerKgInput.addEventListener('input', calculateTotal);
        igstSelect.addEventListener('change', calculateTotal);
      });
    </script>
  @endpush
</x-app-layout>
