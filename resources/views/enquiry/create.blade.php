<x-enquiry-layout title="Create Enquiry">
  {{-- <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Create Enquiry</h3>
          </div>
        </div>
      </div>
      @include('layouts.includes.alerts')
      <form action="{{ route('enquiry.store') }}" method="POST">
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
                      <input type="number" class="form-control" id="p_source_pincode" name="p_source_pincode"
                        value="{{ old('p_source_pincode') }}" placeholder="Source Pincode">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control" id="p_mobile" name="p_mobile"
                        value="{{ old('p_mobile') }}" placeholder="Mobile Number">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="p_address" name="p_address"
                        value="{{ old('p_address') }}" placeholder="Address">
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
                      <input type="number" class="form-control" id="d_source_pincode" name="d_source_pincode"
                        value="{{ old('d_source_pincode') }}" placeholder="Source Pincode">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control" id="d_mobile" name="d_mobile"
                        value="{{ old('d_mobile') }}" placeholder="Mobile Number">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="d_address" name="d_address"
                        value="{{ old('d_address') }}" placeholder="Address">
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
                  <div class="row">
                    <div class="col-lg-6">
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
                        <input type="number" class="form-control" id="weight" name="weight[]"
                          placeholder="Weight">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="height" name="height[]"
                          placeholder="Height">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="length" name="length[]"
                          placeholder="Length">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <input type="number" class="form-control" id="width" name="width[]"
                          placeholder="Width">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input type="number" class="form-control" id="amount" name="amount[]"
                          placeholder="Amount / Value">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <select name="payment_type[]" id="payment_type" class="form-control">
                          <option value="0">Please select</option>
                          <option value="prepaid">Prepaid</option>
                          <option value="cod">Cash on delivery</option>
                        </select>
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
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div> --}}

  <!-- Form Section -->
  <main class="container mb-5">
    @include('layouts.includes.alerts')
    <h2 class="mb-4">Create Enquiry</h2>
    <form action="{{ route('enquiry.store') }}" method="POST">
      @csrf
      <!-- Pickup Address -->
      <div class="card mb-4">
        <div class="card-header fw-semibold">Pickup Address</div>
        <div class="card-body row g-3">
          <div class="col-md-3">
            <label>Name</label>
            <input type="text" class="form-control" name="p_name" placeholder="" required>
          </div>
          <div class="col-md-3">
            <label>Pincode</label>
            <input type="number" class="form-control" name="p_pincode" placeholder="" required>
          </div>
          <div class="col-md-3">
            <label>Mobile Number</label>
            <input type="number" class="form-control" name="p_mobile" placeholder="" required>
          </div>
          <div class="col-12">
            <label>Address</label>
            <input type="Address" class="form-control" name="p_address" placeholder="" required>
          </div>
        </div>
      </div>

      <!-- Delivery Address -->
      <div class="card mb-4">
        <div class="card-header fw-semibold">Delivery Address</div>
        <div class="card-body row g-3">
          <div class="col-md-3">
            <label>Name</label>
            <input type="text" class="form-control" name="d_name" placeholder="" required>
          </div>
          <div class="col-md-3">
            <label>Pincode</label><input type="number" class="form-control" name="d_pincode" placeholder="" required>
          </div>
          <div class="col-md-3">
            <label>Mobile Number</label>
            <input type="number" class="form-control" name="d_mobile" placeholder="" required>
          </div>
          <div class="col-12">
            <label>Address</label>
            <input type="text" class="form-control" name="d_address" placeholder="" required>
          </div>
        </div>
      </div>

      <!-- Package Details -->
      <div class="card mb-4">
        <div class="card-header fw-semibold">Package Details</div>
        <div class="card-body">
          <div class="packages">
            <div class="package-row">
              <div class="row mb-3"> <!-- Added spacing here -->
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
            <button type="button" class="btn btn-primary" id="addPackageBtn">Add One More</button>
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
                <input type="number" class="form-control" name="amount" placeholder="" required>
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
      document.getElementById('addPackageBtn').addEventListener('click', function() {
        const container = document.querySelector('.packages');
        const row = document.querySelector('.package-row');
        const clone = row.cloneNode(true);
        container.appendChild(document.createElement('hr'));
        container.appendChild(clone);
      });
    </script>
  @endpush
  </x-guest-layout>
