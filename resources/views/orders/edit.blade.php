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
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Address</label>
                      <input type="text" class="form-control" id="p_address" name="p_address"
                        value="{{ $order->pickup_address }}" placeholder="Address">
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
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Address</label>
                      <input type="text" class="form-control" id="d_address" name="d_address"
                        value="{{ $order->delivery_address }}" placeholder="Address">
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
                    @foreach ($order->packages as $key => $item)
                      @php
                        $key++;
                      @endphp
                      <div class="row {{ $key > 1 ? 'other_packages_' . $key : null }}">
                        <div class="col-lg-6">
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
                            <input type="number" class="form-control" id="weight" name="weight[]"
                              placeholder="Weight" value="{{ $item->weight }}">
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
                <h4>Price & Payment Type</h4>
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
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Payment
                        Type</label>
                      <select name="payment_type" id="payment_type" class="form-control" required>
                        <option value="0">Please select</option>
                        <option value="prepaid" {{ $order->payment_type == 'prepaid' ? 'selected' : null }}>Prepaid
                        </option>
                        <option value="cod" {{ $order->payment_type == 'cod' ? 'selected' : null }}>Cash on
                          delivery</option>
                      </select>
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
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Shipping
                        Price</label>
                      <input type="number" class="form-control" id="shipping_charge" name="shipping_charge"
                        placeholder="Shipping Price" value="{{ $order->shipping_charge }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Pickup
                        Charge</label>
                      <input type="number" class="form-control" id="pickup_charge" name="pickup_charge"
                        placeholder="Pickup Charge" value="{{ $order->pickup_charge }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Hamali</label>
                      <input type="number" class="form-control" id="hamali" name="hamali" placeholder="Hamali"
                        value="{{ $order->hamali }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">S/C</label>
                      <input type="number" class="form-control" id="sc_cost" name="sc_cost" placeholder="S/C"
                        value="{{ $order->sc_cost }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">ST.
                        Charge</label>
                      <input type="number" class="form-control" id="st_charge" name="st_charge"
                        placeholder="ST. Charge" value="{{ $order->st_charge }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">Delivery
                        Charge</label>
                      <input type="number" class="form-control" id="delivery_charge" name="delivery_charge"
                        placeholder="Delivery Charge" value="{{ $order->delivery_charge }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-label" for="" style="color: black; font-size: 15px;">IGST</label>
                      <input type="number" class="form-control" id="igst" name="igst" placeholder="IGST"
                        value="{{ $order->igst }}">
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
                          <input type="number" class="form-control" name="weight[]"
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
    </script>
  @endpush
</x-app-layout>
