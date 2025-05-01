<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{{ \URL::to('/') }}">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ATS Courier - Create Enquiry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .btn-success {
      background: #920909;
      color: #fff;
    }

    .card-header {
      background: #ffcbcb;
      color: #141414;
    }
  </style>
</head>

<body class="bg-light">

  <!-- Header -->
  <header class="bg-white shadow-sm py-3 mb-4">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <img src="images/logo.png" alt="ATS Logo" class="me-3" style="height: 60px;" />
        <div>
          <h1 class="h4 fw-bold mb-0">ATS Courier Cargo Service</h1>
          <small class="text-muted">Reliable. Fast. Nationwide Delivery.</small>
        </div>
      </div>
      <div class="text-end mt-3 mt-md-0">
        <div><strong>Call:</strong> +91-8436366904 / +91-8537828889</div>
        <div><strong>Email:</strong> atscouirercargos@gmail.com</div>
      </div>
    </div>
  </header>

  {{ $slot }}

  <script src="vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap & JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  @stack('scripts')

</body>

</html>
