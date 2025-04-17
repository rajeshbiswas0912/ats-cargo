<x-app-layout title="Show Order">
  <div class="section__content section__content--p30">
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
                      value="{{ $order->pickup_name }}" placeholder="Name" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="p_pincode" name="p_pincode"
                      value="{{ $order->pickup_pincode }}" placeholder="Pincode" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="p_source_pincode" name="p_source_pincode"
                      value="{{ $order->pickup_source_pincode }}" placeholder="Source Pincode" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="p_mobile" name="p_mobile"
                      value="{{ $order->pickup_mobile }}" placeholder="Mobile Number" readonly>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="p_address" name="p_address"
                      value="{{ $order->pickup_address }}" placeholder="Address" readonly>
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
                      value="{{ $order->delivery_name }}" placeholder="Name" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="d_pincode" name="d_pincode"
                      value="{{ $order->delivery_pincode }}" placeholder="Pincode" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="d_source_pincode" name="d_source_pincode"
                      value="{{ $order->delivery_source_pincode }}" placeholder="Source Pincode" readonly>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="d_mobile" name="d_mobile"
                      value="{{ $order->delivery_mobile }}" placeholder="Mobile Number" readonly>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="d_address" name="d_address"
                      value="{{ $order->delivery_address }}" placeholder="Address" readonly>
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
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="material_type" name="material_type[]"
                            placeholder="Material type" value="{{ $package->material_type }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <input type="text" class="form-control" id="no_of_boxes" name="no_of_boxes[]"
                            placeholder="No of boxes" value="{{ $package->no_of_box }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <input type="text" class="form-control" id="weight" name="weight[]"
                            placeholder="Weight" value="{{ $package->weight }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control" id="height" name="height[]"
                            placeholder="Height" value="{{ $package->height }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control" id="length" name="length[]"
                            placeholder="Length" value="{{ $package->length }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control" id="width" name="width[]"
                            placeholder="Width" value="{{ $package->weight }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <input type="text" class="form-control" id="amount" name="amount[]"
                            placeholder="Amount / Value" value="{{ $package->amount }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <select name="payment_type[]" id="payment_type" class="form-control" disabled readonly>
                            <option value="prepaid" {{ $package->payment_type == 'prepaid' ? 'selected' : null }}>
                              Prepaid</option>
                            <option value="cod" {{ $package->payment_type == 'cod' ? 'selected' : null }}>Cash on
                              delivery</option>
                          </select>
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
