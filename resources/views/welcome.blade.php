<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            } */

            .full-height {
                height: 100vh;
            }
            .card {
                margin-top:15%;
            }
/* 
            .flex-center {
                margin-top:10%;
                align-items: center;
                display: flex;
                justify-content: center;
            } */

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            /* .content {
                text-align: center;
            } */

            .title {
                font-size: 84px;
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

            .header {
                text-align:center;
            }
            /* .m-b-md {
                margin-bottom: 30px;
            } */
            body {
                background-image: url('http://skripsi.test:8090/images/background.jpeg');
                height: 100%;
                margin: 0;
                /* The image used */

                /* Full height */
                height: 100%; 

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                }
                /* background-color: #cccccc; */
            }
        </style>
    </head>
    <body>
        @if (session('success-message'))
            <div class="alert alert-success">
                {{ session('success-message') }}
        </div>
        @endif
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        {{-- <a href="{{ url('/home') }}">Home</a> --}}
                        {{-- <a href="{{ route('login') }}" class="btn btn-warning">Login</a> --}}
                    @else
                    <a href="{{ route('login') }}" class="btn btn-warning">Login</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div style="margin-top:10px">
                                <div style="background-color:black; color:white; font-weight:bold; text-align:center; font-size:50px">
                                    Selamat Datang
                                </div>
                                <div style="background-color:black; color:white; font-weight:bold; text-align:center; font-size:30px">
                                    Di Kelurahan Gandasari Kota Tangerang
                                </div>
                                <div style="background-color:black; color:white; font-weight:bold; text-align:center; font-size:30px">
                                    <a href="{{ route('tentang') }}" class="btn btn-primary btn-sm">Tentang Perusahaan</a>
                                </div>
                            </div>
                            
                            <div class="card" >
                                <div class="card-header header" >{{ __('Daftar Sebelum Isi Pertanyaan') }}</div>
                                
                                <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    <form action="{{ route('storeCreate1') }}" method="post">
                                        @csrf
                                        <label for="">NIK</label>
                                        <input name="nik" type="text" maxlength="16" class="form-control">
                                        <label for="">Nama</label>
                                        <input name="name" type="text" class="form-control">
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        {{-- <a href="{{ route('penilaian.index') }}" class="btn btn-warning btn-sm">Back</a> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')

    </body>
</html>
