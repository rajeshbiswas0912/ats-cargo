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
                <h4>Price & Payment Type</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                        required>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <select name="payment_type" id="payment_type" class="form-control" required>
                        <option value="0">Please select</option>
                        <option value="prepaid">Prepaid</option>
                        <option value="cod">Cash on delivery</option>
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
