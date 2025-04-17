<x-app-layout title="Dashboard">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h4>Total Orders</h4>
              <div>{{ number_format($totalOrders) }}</div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h4>Orders Delivered</h4>
              <div>{{ number_format($totalDelivered) }}</div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h4>Today's Orders</h4>
              <div>{{ number_format($todaysOrders) }}</div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4>Total Revenue</h4>
              <div>Rs.{{ number_format($totalRevenue, 2) }}/-</div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4>Today's Revenue</h4>
              <div>Rs.{{ number_format($todaysRevenue, 2) }}/-</div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              Graph
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h4>Latest Enquiry</h4>
              <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                  <thead>
                    <tr>
                      <th>Customer Name</th>
                      <th>Customer Mobile</th>
                      <th>Pincode</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($latestEnquirys->isNotEmpty())
                      @foreach ($latestEnquirys as $enquiry)
                        <tr>
                          <td><a href="{{ route('orders.show', $enquiry->id) }}">{{ $enquiry->delivery_name }}</a>
                          </td>
                          <td>{{ $enquiry->delivery_mobile }}</td>
                          <td>{{ $enquiry->delivery_pincode }}</td>
                          <td>{{ $enquiry->delivery_address }}</td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</x-app-layout>
