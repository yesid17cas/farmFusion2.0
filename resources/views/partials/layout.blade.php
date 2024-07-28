<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Farmfusion</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="images/Logo-2.0.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  @yield('style');

</head>

<body>
  @include('partials.header')

  @yield('content')

  @include('partials.footer')

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <!-- Template Javascript -->
  <script src="js/script.js"></script>
</body>

</html>