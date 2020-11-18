<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <!-- Title -->
  <title>{{ config('app.name') }} - Privacy Policy</title>
  <!-- Meta -->
  <meta name="author" content="Ahmet Tongul">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link href="{{ asset('dashboard/assets/css/app.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> 
</head>
<body>
  <div id="single">
    <div class="container">
      <div class="sections">
        <h1 class="mb-5"><i class="fas fa-leaf"></i></h1>
        <div class="section">
            <h5>Privacy Policy for Online Bookmark</h5>
            <p>At Online Bookmark, accessible from http://127.0.0.1:8000, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Online Bookmark and how we use it.</p>
            <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('dashboard/assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="https://kit.fontawesome.com/93fcdfb910.js"></script>
</body>
</html>