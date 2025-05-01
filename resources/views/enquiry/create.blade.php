<x-enquiry-layout title="Create Enquiry">
  <!-- Form Section -->
  <main class="container mb-5">
    @if (session('success'))
      <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{ session('success') }}
      </div>
    @endif


    @if ($errors->any())
      <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        @foreach ($errors->all() as $error)
          {{ $error }}
        @endforeach
      </div>
    @endif

    @if (session('error'))
      <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        {{ session('error') }}
      </div>
    @endif
    <h2 class="mb-4">Create Enquiry</h2>
    <form action="{{ route('enquiry.store') }}" method="POST">
      @csrf
      <!-- Pickup Address -->
      <div class="card mb-4">
        <div class="card-header fw-semibold">Pickup Address</div>
        <div class="card-body row g-3">
          <div class="col-md-3">
            <label>Name</label>
            <input type="text" class="form-control" name="p_name" placeholder="" value="{{ old('p_name') }}"
              required>
          </div>
          <div class="col-md-3">
            <label>Pincode</label>
            <input type="number" class="form-control" name="p_pincode" value="{{ old('p_pincode') }}" placeholder=""
              required>
          </div>
          <div class="col-md-3">
            <label>Mobile Number</label>
            <input type="number" class="form-control" name="p_mobile" value="{{ old('p_mobile') }}" placeholder=""
              required>
          </div>
          <div class="col-12">
            <label>Address</label>
            <input type="Address" class="form-control" name="p_address" value="{{ old('p_address') }}" placeholder=""
              required>
          </div>
        </div>
      </div>

      <!-- Delivery Address -->
      <div class="card mb-4">
        <div class="card-header fw-semibold">Delivery Address</div>
        <div class="card-body row g-3">
          <div class="col-md-3">
            <label>Name</label>
            <input type="text" class="form-control" name="d_name" value="{{ old('d_name') }}" placeholder=""
              required>
          </div>
          <div class="col-md-3">
            <label>Pincode</label><input type="number" class="form-control" name="d_pincode"
              value="{{ old('d_pincode') }}" placeholder="" required>
          </div>
          <div class="col-md-3">
            <label>Mobile Number</label>
            <input type="number" class="form-control" name="d_mobile" placeholder="" value="{{ old('d_mobile') }}"
              required>
          </div>
          <div class="col-12">
            <label>Address</label>
            <input type="text" class="form-control" name="d_address" placeholder="" value="{{ old('d_address') }}"
              required>
          </div>
        </div>
      </div>

      <!-- Package Details -->
      <div class="card mb-4">
        <div class="card-header fw-semibold">Package Details</div>
        <div class="card-body">
          <div class="packages packages_list">
            <div class="package-row mb-4">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label">Material Type</label>
                  <input type="text" class="form-control" name="material_type[]" required>
                </div>
                <div class="col-md-2">
                  <label class="form-label">No of boxes</label>
                  <input type="number" class="form-control" name="no_of_boxes[]" required>
                </div>
                <div class="col-md-2">
                  <label class="form-label">Weight</label>
                  <input type="number" class="form-control" name="weight[]" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label class="form-label">Height (cm)</label>
                  <input type="number" class="form-control" name="height[]" required>
                </div>
                <div class="col-md-2">
                  <label class="form-label">Length (cm)</label>
                  <input type="number" class="form-control" name="length[]" required>
                </div>
                <div class="col-md-2">
                  <label class="form-label">Width (cm)</label>
                  <input type="number" class="form-control" name="width[]" required>
                </div>
              </div>
            </div>

          </div>
          <div class="text-end mt-3">
            <button type="button" class="btn btn-primary add_more_package" id="addPackageBtn"
              data-count-row="1">Add
              One More</button>
          </div>
        </div>
      </div>


      <!-- Package Details -->
      <div class="card mb-4">
        <div class="card-header fw-semibold">Price & Payment Type</div>
        <div class="card-body">
          <div class="packages">
            <div class="row g-3 package-row">
              <div class="col-md-3">
                <label class="form-label">Amount (₹)</label>
                <input type="number" class="form-control" name="amount" placeholder=""
                  value="{{ old('amount') }}" required>
              </div>
              <div class="col-md-3">
                <label class="form-label">Payment Type</label>
                <select name="payment_type" class="form-select" required>
                  <option value="">Select Payment</option>
                  <option value="prepaid">Prepaid</option>
                  <option value="cod">Cash on Delivery</option>
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="text-end">
        <button type="submit" class="btn btn-success px-5">Submit</button>
      </div>

    </form>
  </main>

  @push('scripts')
    <script>
      $(document).on('click', '.add_more_package', function() {
        let count = Number($(this).attr('data-count-row'));
        count++;
        let html = `<div class="package-row mb-4 other_packages_${count}">
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label class="form-label">Material Type</label>
                        <input type="text" class="form-control" name="material_type[]" required>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">No of boxes</label>
                        <input type="number" class="form-control" name="no_of_boxes[]" required>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Weight</label>
                        <input type="number" class="form-control" name="weight[]" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-2">
                        <label class="form-label">Height (cm)</label>
                        <input type="number" class="form-control" name="height[]" required>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Length (cm)</label>
                        <input type="number" class="form-control" name="length[]" required>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Width (cm)</label>
                        <input type="number" class="form-control" name="width[]" required>
                      </div>
                    </div>
                  </div>`;

        $('.packages_list').append(html);
        $(this).attr('data-count-row', count);
      });

      // document.getElementById('addPackageBtn').addEventListener('click', function() {
      //   const container = document.querySelector('.packages');
      //   const row = document.querySelector('.package-row');
      //   const clone = row.cloneNode(true);
      //   container.appendChild(document.createElement('hr'));
      //   container.appendChild(clone);
      // });
    </script>
  @endpush
</x-enquiry-layout>
