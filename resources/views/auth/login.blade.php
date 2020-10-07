<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gull - Laravel 7 + Bootstrap 4 admin template</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
        <style>
            @media (min-width: 1024px) {
                .auth-layout-wrap .auth-content {
                    min-width: 345px;
                }
                .auth-layout-wrap .auth-content {
                    max-width: 345px;
                    margin: auto;
                }
            }
        </style>
    </head>

    <body style="background: #ECE9E6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #ECE9E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
       <div class="container" style="display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 100vh;
    background-size: cover;">
           <div class="row justify-content-end">
               <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 d-sm-none d-md-block d-none d-sm-block">
                   <div class="pt-4" style="position: absolute; top: 0; left: 0;">
                       <h1 class="">Selamat Datang,</h1>
                       <h1 class="pb-5">Vehicle Alert Management System (VAMS)</h1>
                   <img src="{{ asset('assets/images/bg-3.png') }}" width="90%"  style="position: relative">

                   </div>
               </div>
               <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4">
                   <div class="card o-hidden">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="p-4">
                                   <div class=" text-center mb-4">
                                       <img src="{{asset('assets/images/logo.png')}}" alt="" height="100px" >
                                   </div>
                                   <h1 class="mb-3 text-18 text-lg-center">Log Masuk</h1>
                                   <form method="POST" action="{{ route('login') }}">
                                       @csrf
                                       <div class="form-group">
                                           <label for="email">Email address</label>
                                           <input id="email"
                                                  class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                                  name="email" value="{{ old('email') }}" required autocomplete="email"
                                                  autofocus>
                                           @error('email')
                                           <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                           @enderror
                                       </div>
                                       <div class="form-group">
                                           <label for="password">Password</label>
                                           <input id="password" type="password"
                                                  class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                                  name="password" required autocomplete="current-password">
                                           @error('password')
                                           <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                           @enderror
                                       </div>
                                       <div class="form-group ">
                                           <div class="">
                                               <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" name="remember"
                                                          id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                   <label class="form-check-label" for="remember">
                                                       {{ __('Remember Me') }}
                                                   </label>
                                               </div>
                                           </div>
                                       </div>

                                       <button class="btn btn-rounded btn-primary btn-block mt-2">Log Masuk</button>

                                   </form>
                                   @if (Route::has('password.request'))

                                       <div class="mt-3 text-center">

                                           <a href="{{ route('password.request') }}" class="text-muted"><u>Forgot
                                                   Password?</u></a>
                                       </div>
                                   @endif
                               </div>
                           </div>
                       </div>
                   </div>
           </div>
       </div>
       </div>
    </body>

</html>
