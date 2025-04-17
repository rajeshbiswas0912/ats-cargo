@if (session('success'))
  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
@endif


@if ($errors->any())
  <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    @foreach ($errors->all() as $error)
      {{ $error }}
    @endforeach

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
@endif

@if (session('error'))
  <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
@endif
