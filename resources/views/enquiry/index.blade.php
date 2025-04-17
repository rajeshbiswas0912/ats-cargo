<x-app-layout title="Enquiries">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Enquiries</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card border">
            <div class="card-body">
              <form action="">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="search" name="search"
                        placeholder="Customer Name / Mobile Number" value="{{ request()->search }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="from_date" name="from_date" placeholder="From Date"
                        readonly value="{{ request()->from_date }}">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" id="to_date" name="to_date" placeholder="To Date"
                        readonly value="{{ request()->to_date }}">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <a href="{{ route('enquiries.index') }}" class="btn btn-danger">Reset</a>
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Mobile Number</th>
                  <th>Weight</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Order Created</th>
                </tr>
              </thead>
              <tbody>
                @if ($enquiries->isNotEmpty())
                  @foreach ($enquiries as $enquiry)
                    <tr>
                      <td>
                        <a href="{{ route('enquiries.details', $enquiry->id) }}">{{ $enquiry->delivery_name }}</a>
                      </td>
                      <td>{{ $enquiry->delivery_mobile }}</td>
                      <td>{{ $enquiry->packages_sum_weight }}kg</td>
                      <td>Rs.{{ number_format($enquiry->packages_sum_amount, 2) }}/-</td>
                      <td>{{ \Carbon\Carbon::parse($enquiry->created_at)->format('d M Y') }}</td>
                      <td class="{{ $enquiry->orderCreated === '1' ? 'text-success' : 'text-danger' }}">
                        {{ $enquiry->orderCreated === '1' ? 'Yes' : 'No' }}</td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" class="text-center">No orders found</td>
                  </tr>
                @endif
              </tbody>
            </table>
            @if ($enquiries->isNotEmpty())
              <div class="mt-4 text-right">
                {{ $enquiries->links('pagination::bootstrap-4') }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      $(document).ready(function() {
        $("#from_date, #to_date").datepicker({
          changeMonth: true,
          changeYear: true,
          maxDate: new Date(),
          minDate: new Date(2001, 0, 1),
          yearRange: "2001:c"
        });
      });
    </script>
  @endpush
</x-app-layout>
