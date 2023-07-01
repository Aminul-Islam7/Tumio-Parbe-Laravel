<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Tumio Parbe{{ isset($title) ? " - $title" : $title = null}}</title>
  
  
  {{-- Icon --}}
  <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">


  {{-- Fonts --}}
  <link
  href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Indie+Flower&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Sans+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
  
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
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#courses">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#awards">Awards</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#contact">Contact</a>
          </li>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><i class="fa-duotone fa-right-to-bracket"></i> Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register-phone') }}"><i class="fa-duotone fa-pen-to-square"></i> Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </header>

  <main>
    {{$slot}}
  </main>
  
  <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  
  @include('javascript')

</body>
</html>