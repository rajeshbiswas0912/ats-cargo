<x-tracking-layout title="Order Tracking">
  <section class="tracking-details mb-5">
    <div class="container">
      <div class="top-heading mb-4">
        <h2 class="text-black">Tracking Details</h2>
      </div>
      @if ($order)
        <div class="tracking-detail-wraper">
          <div class="row">
            <div class="col-lg-6">
              <div class="sngl-box">
                <h3>Pickup Address</h3>
                <ul>
                  <li><span>Name</span> {{ $order->pickup_name }}</li>
                  <li><span>Pincode</span> {{ $order->pickup_pincode }}</li>
                  <li><span>Mobile Number</span> {{ $order->pickup_mobile }}</li>
                  <li><span>Address</span> {{ $order->pickup_address }}</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="sngl-box">
                <h3>Delivery Address</h3>
                <ul>
                  <li><span>Name</span> {{ $order->delivery_name }}</li>
                  <li><span>Pincode</span> {{ $order->delivery_pincode }}</li>
                  <li><span>Mobile Number</span> {{ $order->delivery_mobile }}</li>
                  <li><span>Address</span> {{ $order->delivery_address }}</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="sngl-box">
                <h3>Package Details</h3>
                @if ($order->packages->isNotEmpty())
                  @foreach ($order->packages as $item)
                    <ul class="mb-3">
                      <li><span>Material Type</span> {{ $item->material_type }}</li>
                      <li><span>No of boxes</span> {{ $item->no_of_box }}</li>
                      <li><span>Weight</span> {{ $item->weight }}</li>
                      <li><span>Height (cm)</span> {{ $item->height }}</li>
                      <li><span>Length (cm)</span> {{ $item->length }}</li>
                      <li><span>Width (cm)</span> {{ $item->width }}</li>
                    </ul>
                  @endforeach
                @endif
              </div>
            </div>
            <div class="col-lg-6">
              <div class="sngl-box">
                <h3>Price & Payment Type</h3>
                <ul>
                  <li><span>Amount (₹)</span> {{ number_format($order->total_amount, 2) }}/-</li>
                  <li><span>Payment Type</span> {{ $order->payment_type === 'cod' ? 'Cash on Delivery' : 'Prepaid' }}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        @if ($order->tracking->isNotEmpty())
          <div class="track-dlvry">
            <div class="row">
              @foreach ($order->tracking as $item)
                <div class="col-lg-3">
                  <div class="card border">
                    <div class="card-body">
                      <div>{{ $item->location }}</div>
                      <div>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y h:i A') }}</div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      @else
        <div class="text-center">
          <h3>No Order Found</h3>
        </div>
      @endif
    </div>

  </section>
</x-tracking-layout>
