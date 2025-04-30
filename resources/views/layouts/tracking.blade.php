<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <style type="text/css">
    .tracking-details .tracking-detail-wraper .sngl-box h3 {
      margin: 0;
      padding: 20px;
      background-color: #ffcbcb;
      font-size: 20px;
      border-radius: 10px 10px 0 0;
    }

    .tracking-details .tracking-detail-wraper .sngl-box ul {
      padding: 20px;
      list-style: none;
      background-color: #fff;
    }

    .tracking-details .tracking-detail-wraper .sngl-box {
      height: 100%;
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 0 15px #dfdfdf;
    }

    .tracking-detail-wraper .col-lg-6 {
      margin-bottom: 20px;
    }

    .tracking-details .tracking-detail-wraper .sngl-box ul li span {
      position: absolute;
      top: 6px;
      left: 0;
      font-weight: 500;
      color: #959595;
    }

    .tracking-details .tracking-detail-wraper .sngl-box ul li {
      padding: 5px 0;
      position: relative;
      font-size: 18px;
      padding-left: 170px;
    }

    .tracking-details .track-dlvry .row:last-child .card {
      background-color: #702be33d;
      position: relative;
      margin-top: 20px;
    }

    .tracking-details .track-dlvry .row:last-child .card::before {
      content: "→";
      position: absolute;
      right: -21px;
      top: 50%;
      transform: translate(0px, -50%);
      font-size: 18px;
      color: #0f003d;
    }

    .tracking-details .track-dlvry .row:last-child .col-lg-3:last-child .card::before {
      display: none;
    }

    .tracking-details .track-dlvry .row:last-child .col-lg-3:last-child .card div {
      color: #fff;
    }

    .tracking-details .track-dlvry .row:last-child .col-lg-3:last-child .card {
      background-color: #6c71e1;
    }

    .tracking-details .track-dlvry .card-body div {
      color: #000;
      font-size: 18px;
    }

    .tracking-details .track-dlvry .card-body div:first-child {
      font-weight: 600;
      font-size: 21px !important;
    }


    @media only screen and (max-width: 991px) {
      .tracking-details .track-dlvry .row:last-child .card::before {
        content: "↓";
        position: absolute;
        right: unset;
        top: unset;
        transform: translate(0px, 0%);
        font-size: 18px;
        color: #0f003d;
        bottom: -21px;
        left: 0;
        right: 0;
        margin: 0 auto;
        text-align: center;
      }


    }

    @media only screen and (max-width: 767px) {
      .tracking-details .tracking-detail-wraper .sngl-box ul li {
        padding-left: 0;
      }

      .tracking-details .tracking-detail-wraper .sngl-box ul li span {
        position: relative;
        display: block;
        width: 100%;
        top: 0;
      }

    }
  </style>
</head>

<body class="bg-light">
  {{ $slot }}
</body>



</html>
