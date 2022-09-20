<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>S2P Office Helper</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS cek -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" action="/login" method="post">
      @csrf
      <div class="text-center mb-4">
        <img class="mb-4" src="/img/logo.jpg" alt="" width="85" height="72">
        <h1 class="h4 mb-3 font-weight-normal">PT SUMBER SEGARA PRIMADAYA <br> DEVELOPMENT COOL</h1>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" 
          class="form-control" 
          placeholder="Email address" 
          value="{{ old('email') }}"
          name="email"
          {{-- required  --}}
          autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      
      <div class="form-label-group">
        <input type="password" id="inputPassword" 
        class="form-control"
        name="password" 
        placeholder="Password" 
        {{-- required --}}
        >
        <label for="inputPassword">Password</label>
      </div>
      
      @if(session()->has('LoginError'))
        <div class="alert alert-danger" role="alert">
          {{ session('LoginError') }}
        </div>
      @endif


      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <a href="#">
        <p class="mt-5 mb-3 text-muted text-center">&copy; S2P Jakarta</p>
      </a>
    </form>


  </body>
</html>