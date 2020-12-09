<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;900&family=Ubuntu&display=swap" rel="stylesheet">

        {{-- fontawesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>  
    <section id="title">
    <div class="container-fluid">

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href=""><i class="fas fa-paw mr-1"></i>{{ config('app.name', 'Todo') }} </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
       </button> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     @if (Route::has('login'))
      <ul class="navbar-nav ml-auto">
        @auth
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/home') }}">Home</a>
          </li>
        @else
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
           @if (Route::has('register'))
            <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
         @endauth
      </ul>
      @endif
    </div>
    </nav>
    <!-- Title -->
    <div class="row">
            <div class="col-lg-6">
                <img src="/images/pink_panther2.png" class="img-fluid" alt="pink_panther">
            </div>
            <div class="col-lg-6">
            <h1 class="">Even Pink Panther has a Todo List .....Make yours now!!</h1>
            <a class="btn btn-dark login-register-button btn-lg" href="{{ route('login') }}">Login</a>
            <a class="btn btn-dark login register-button btn-lg" href="{{ route('register') }}">Register</a>
            </div>
        </div>
        </section>

        <!-- Features -->

  <section id="features">

    <div class="row">

      <div class="feature-box col-lg-4">
        <i class="icon fa fa-heart fa-4x" aria-hidden="true"></i>
        <h3>Easy to use.</h3>
        <p>It is user friendly and easy to use.</p>
      </div>

      <div class="feature-box col-lg-4">
        <i class="icon fas fa-clipboard-list fa-4x"></i>
        <h3>Create your Todo.</h3>
        <p>It is possible to create,update and delete your todos.</p>
      </div>

      <div class="feature-box col-lg-4">
        <i class="icon fas fa-check-circle fa-4x"></i>
        <h3>Mark as completed</h3>
        <p>Mark your Todo as completed when the task is done.</p>
      </div>

    </div>

    <div class="row">

      <div class="feature-box col-lg-4">
        <i class="icon fas fa-lock fa-4x"></i>
        <h3>Security.</h3>
        <p>Provides a secure platform.</p>
      </div>

      <div class="feature-box col-lg-4">
        <i class="icon fas fa-calendar-alt fa-4x"></i>
        <h3>Calendar view.</h3>
        <p>Get a calendar view for your Todo list.</p>
      </div>

      <div class="feature-box col-lg-4">
        <i class="icon fas fa-bell fa-4x"></i>
        <h3>Notification</h3>
        <p>Set reminders and get notified.</p>
      </div>
    </div>
  </section>


{{-- example section --}}
  <section id="exmp">
    <h3 class="exmp-heading">Pink Panther's Todo List:</h3>
    <img src="/images/pink_panther6.png" alt="pink_panther_laying" class="img-fluid" >
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><strong class="wrap">Todo</strong></li>
      <li class="list-group-item"><strong class="wrap">Todo</strong></li>
      <li class="list-group-item "><strong class="wrap">todo,todo,todo,todo,todooooo...</strong></li>
    </ul>
  </section>
  <!-- Footer -->

  <footer id="footer">
    <i class="pr-2 fab fa-twitter"></i>
    <i class="pr-2 fab fa-facebook-f"></i>
    <i class="pr-2 fab fa-instagram"></i>
    <i class="pr-2 far fa-envelope"></i>
    <p>&copy; Copyright 2020 Todo</p>

  </footer>
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    </body>
</html>
