<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>{{ config('app.name', 'ShopApp') }}</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Slick -->
    <link href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/slick-theme.css') }}" rel="stylesheet">


    <!-- nouislider -->
    <link href="{{ asset('frontend/css/nouislider.min.css') }}" rel="stylesheet">

    <!-- Font Awesome Icon -->
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">


    <!-- Custom stlylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->

</head>

<body>
    <style>
        .wrapper {
            display: flex;
            justify-content: center;
            /* center items vertically, in this case */
            align-items: center;
            height: 600px;
        }

        .primary-btn {
            display: block;
            width: 100%;
        }

        .disabled-btn {
            display: block;
            width: 100%;
        }
    </style>
    <div class="wrapper">
        <div class="col-md-5 order-details">
            <div class="section-title text-center">
                <h3 class="title">ShopApp <small>Register</small></h3>
            </div>
            <div class="form-login">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <input id="name" placeholder="Masukan Nama" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group row">
                        <input id="email" placeholder="Masukan Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input id="nohp" placeholder="Masukan No Hp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}"  autocomplete="nohp" autofocus>
                        @error('nohp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input id="alamat" placeholder="Masukan Alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}"  autocomplete="alamat" autofocus>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group row">
                        <input id="password" placeholder="Masukan Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input id="password-confirm" placeholder="Masukan Password Sekali Lagi" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>

                    <div class="form-group row">
                        <div class="input-checkbox">
                            <input type="checkbox" name="remember" id="remember" >
                            <label for="remember">
                                <span></span>
                                Anda Telah Menyetujui Peraturan Kami
                            </label>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">
                            <button type="submit" id="btn-register" class="disabled-btn btn-register" disabled>
                                {{ __('Daftar') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="text-center">
                    Sudah punya akun?
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script type="text/javascript">
        $(":checkbox").click(function(e) {
            e.stopPropagation();
            var val = $(this).is(':checked');
            if (val === true) {
                $('#btn-register').addClass('primary-btn').attr('disabled', false)
            } else if (val === false) {
                $('#btn-register').removeClass('primary-btn').attr('disabled', true)
            }
        });
    </script>

</body>

</html>