<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{{ \URL::to('/') }}">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-image: url('../html/images/24177.jpg');
      background-size: cover;
      background-position: center;
    }

    .backdrop {
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0.199);
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(255, 255, 255, 0.514);
      /* White overlay with opacity */
      z-index: -1;
    }
  </style>
</head>

<body class="flex flex-col items-center justify-center h-screen text-white">

  {{ $slot }}

</body>

</html>
