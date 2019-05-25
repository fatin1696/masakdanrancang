<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

  
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-login.css')}}" />
        <link href="{{ asset('font/backend_font/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aplikasi Masak & Rancang</title>
        <link rel="icon" href="images/core-img/favicon.ico">


        <!-- Fonts -->
        <link href="{{ asset('font/backend_font/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <style>
            html, body {
                html 
                background-color:#AFEEEE;
                color: #000;
                font-family: 'Nunito', sans-serif;
                font-weight: 400;
                height: 100vh;
                margin: 0;
                background-image: url("images/background.jpg");
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="post" action="{{ route('login') }}">{{ csrf_field()}}
				 <div class="control-group normal_text"> <img src="{{ asset('images/logo.png')}}" alt="Logo" /></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                        
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="{{ route('register') }}" class="flip-link btn btn-info" id="to-recover">DAFTAR AKAUN</a></span>
                    <span class="pull-right"><input type="submit" value="DAFTAR MASUK" class="btn btn-success" /> </span>
                </div>
            </form>
            
        
        <script src="{{ asset('js/backend_js/jquery.min.js')}}"></script>  
        <script src="{{ asset('js/backend_jsmatrix.login.js')}}"></script> 
    </body>

</html>
