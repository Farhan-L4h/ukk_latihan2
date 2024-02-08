@extends('layouts.app')

@section('content')

<body class="bg">
    <div class="container">

        <style>
            body {
                background-image: url("{{asset('banner/bg1.png')}}");
                background-position: center center;
                background-size: cover;
                background-attachment: fixed;
                display: inline;
                float: left;
                position: relative;
                width: 100%;
            }

            .bg {
                justify-content: center;
                align-items: center;
                height: auto;
                position: relative;

                height: 100vh;
                /* Menambahkan posisi relatif */
            }

            .bg::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                /* Warna hitam dengan opacity 50% */
                z-index: 0;
                /* Mengatur lapisan di atas background */
            }
        </style>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg my-8" style="margin-top: 100px;">
                    <div class="card-header">
                        <h3 class="text-center"><b>Login</b></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label text-md-center">Email</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label text-md-center">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                           
                                <div class="row mb-3 ">
                                    <div class="col-md-8 offset-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection