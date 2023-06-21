<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Tumio Parbe{{ isset($title) ? " - $title" : $title = null}}</title>
  
  {{-- Icon --}}
  
  <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
  
  {{-- Font Awesome CSS --}}
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">

  {{-- Bootstrap CSS --}}
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  {{-- Main CSS --}}
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>

  <header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img width="60" src="{{asset('images/logo.png')}}" alt="Tumio Parbe logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#courses">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#awards">Awards</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="/users/login"><i class="fa-duotone fa-right-to-bracket"></i> Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </header>

  {{$slot}}

  <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>