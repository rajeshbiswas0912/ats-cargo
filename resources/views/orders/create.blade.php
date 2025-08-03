<x-app-layout title="Create Order">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Create Order</h3>
          </div>
        </div>
      </div>
      @include('layouts.includes.alerts')
      <form action="{{ route('orders.store') }}" method="POST">
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
                      <input type="text" class="form-control" id="p_name" name="p_name"
                        value="{{ old('p_name') }}" placeholder="Name">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control" id="p_pincode" name="p_pincode"
                        value="{{ old('p_pincode') }}" placeholder="Pincode">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="tel" class="form-control" id="p_mobile" name="p_mobile"
                        value="{{ old('p_mobile') }}" placeholder="Mobile Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="p_city" name="p_city"
                        value="{{ old('p_city') }}" placeholder="City" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="p_address" name="p_address"
                        value="{{ old('p_address') }}" placeholder="Address">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="p_gst_no" name="p_gst_no"
                        value="{{ old('p_gst_no') }}" placeholder="GST Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="p_pan_no" name="p_pan_no"
                        value="{{ old('p_pan_no') }}" placeholder="PAN Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="p_other_doc_no" name="p_other_doc_no"
                        value="{{ old('p_other_doc_no') }}" placeholder="Other Document Number">
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
                      <input type="text" class="form-control" id="d_name" name="d_name"
                        value="{{ old('d_name') }}" placeholder="Name">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control" id="d_pincode" name="d_pincode"
                        value="{{ old('d_pincode') }}" placeholder="Pincode">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="tel" class="form-control" id="d_mobile" name="d_mobile"
                        value="{{ old('d_mobile') }}" placeholder="Mobile Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="d_city" name="d_city"
                        value="{{ old('d_city') }}" placeholder="City" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="d_address" name="d_address"
                        value="{{ old('d_address') }}" placeholder="Address">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="d_gst_no" name="d_gst_no"
                        value="{{ old('d_gst_no') }}" placeholder="GST Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="eway_bill_no" name="eway_bill_no"
                        value="{{ old('eway_bill_no') }}" placeholder="EWAY Bill Number">
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
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input type="text" class="form-control" id="material_type" name="material_type[]"
                          placeholder="Material type">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input type="number" class="form-control" id="no_of_boxes" name="no_of_boxes[]"
                          placeholder="No of boxes">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input type="number" class="form-control charge" id="weight" name="weight[]"
                          placeholder="Weight">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input type="text" class="form-control" id="method_of_packing" name="method_of_packing[]"
                          placeholder="Method of Packing" required>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="height" name="height[]"
                          placeholder="Height (cm)">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="length" name="length[]"
                          placeholder="Length (cm)">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="width" name="width[]"
                          placeholder="Width (cm)">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="volume_weight" name="volume_weight[]"
                          placeholder="Volume Weight">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="charges_weight" name="charges_weight[]"
                          placeholder="Charges Weight">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-lg-12 text-right">
                      <button type="button" class="btn btn-primary add_more_package" data-count-row="1">Add one
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
                      <input type="number" class="form-control" id="price" name="price"
                        placeholder="Material Value" required>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="invoice_no" name="invoice_no"
                        placeholder="Invoice Number" required>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="invoice_date" name="invoice_date"
                        placeholder="Invoice Date" required onfocus="(this.type='date')"
                        onblur="if(this.value===''){this.type='text'}">
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
                      <input type="number" class="form-control" id="price_per_kg" name="price_per_kg"
                        placeholder="Price Per KG">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control charge" id="shipping_charge" name="shipping_charge"
                        placeholder="Shipping Price">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control charge" id="pickup_charge" name="pickup_charge"
                        placeholder="Pickup Charge">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control charge" id="hamali" name="hamali"
                        placeholder="Hamali">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control charge" id="sc_cost" name="sc_cost"
                        placeholder="S/C">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control charge" id="st_charge" name="st_charge"
                        placeholder="ST. Charge">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control charge" id="delivery_charge" name="delivery_charge"
                        placeholder="Delivery Charge">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select name="igst" id="igst" class="form-control">
                        <option value="">IGST</option>
                        <option value="0">0%</option>
                        <option value="5">5%</option>
                        <option value="12">12%</option>
                        <option value="18">18%</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control charge" id="gst_value" name="gst_value"
                        placeholder="IGST Value">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control" id="total" name="total" placeholder="Total"
                        step="any" required>
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
                      <select name="mode_of_transport" id="mode_of_transport" class="form-control" required>
                        <option value="">Mode of Transport</option>
                        <option value="road">Road</option>
                        <option value="rail">Rail</option>
                        <option value="air">Air</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select name="payment_type" id="payment_type" class="form-control" required>
                        <option value="">Payment Type</option>
                        <option value="Prepaid">Prepaid</option>
                        <option value="Cash On">Cash On</option>
                        <option value="To Be Bill">To Be Bill</option>
                        <option value="Freight on Delivery">Freight on Delivery</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select name="mode_of_delivery" id="mode_of_delivery" class="form-control" required>
                        <option value="">Mode of Delivery</option>
                        <option value="Door to Door">Door to Door</option>
                        <option value="Godown to Door">Godown to Door</option>
                        <option value="Godown to Godown">Godown to Godown</option>
                        <option value="Door to Godown">Door to Godown</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select name="gst_paid_by" id="gst_paid_by" class="form-control">
                        <option value="">GST Paid By</option>
                        <option value="Consignor">Consignor</option>
                        <option value="Consignee">Consignee</option>
                        <option value="Transpoter">Transpoter</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="vehicle_no" name="vehicle_no"
                        placeholder="Vehicle Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="challan_no" name="challan_no"
                        placeholder="Challan Number">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select name="owner_risk_carrier_risk" id="owner_risk_carrier_risk" class="form-control">
                        <option value="">Owner Risk/Carrier Risk</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="O/R">O/R</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea>
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
                    <div class="col-lg-3">
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
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input type="text" class="form-control" id="method_of_packing" name="method_of_packing[]"
                          placeholder="Method of Packing" required>
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
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="volume_weight" name="volume_weight[]"
                          placeholder="Volume Weight">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="charges_weight" name="charges_weight[]"
                          placeholder="Charges Weight">
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

          // 3️⃣ Final total (rounded to 2 decimals)
          totalField.value = subtotal.toFixed(2);
        }

        // Recalculate whenever the user types or changes a value
        chargeFields.forEach(el => el.addEventListener('input', calculateTotal));

        function calculateShipping() {
          let totalWeight = 0;
          document.querySelectorAll('input[name="charges_weight[]"]').forEach(w => {
            totalWeight += parseFloat(w.value) || 0;
          });

          const pricePerKg = parseFloat(pricePerKgInput.value) || 0;
          const shippingCharge = totalWeight * pricePerKg;

          document.getElementById('shipping_charge').value = shippingCharge.toFixed(2);
          claculateIgst();
          calculateTotal();
        }

        pricePerKgInput.addEventListener('input', calculateShipping);

        function claculateIgst() {
          const shippingCharge = parseFloat(document.getElementById('shipping_charge').value) || 0;
          const igstRate = parseFloat(igstSelect.value) || 0;
          const igstAmount = parseFloat(shippingCharge) * igstRate / 100;

          document.getElementById('gst_value').value = igstAmount.toFixed(2);
          calculateTotal();
        }

        igstSelect.addEventListener('change', claculateIgst);
      });
    </script>
  @endpush
</x-app-layout>
