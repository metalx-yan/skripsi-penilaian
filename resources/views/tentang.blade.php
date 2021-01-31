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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    @else
                        <a href="{{ route('login') }}" class="btn btn-warning">Login</a>

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card" >
                                <div class="card-header header" >{{ __('Struktur Organisasi & Visi Misi') }}</div>
                                
                                <div class="card-body">
                                    {{-- <h4 style="text-align:center"><b>Struktur Organisasi</b></h4> --}}
                                    {{-- <img src="{{ asset('images/Struktur.jpg') }}" height="400px" width="700px" alt="">
                                    <hr> --}}
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                              <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ asset('images/Struktur.jpg') }}" alt="First slide">
                                              </div>
                                              <div class="carousel-item">
                                                    <h4 style="text-align:center"><b>Visi Misi</b></h4>
                                                    <label for="">Visi</label>
                                                    <ul>
                                                        <li>Terwujudnya satuan kerja perangkat daerah (skpd) yang maju dan profesional dalam pelayanan (mapan) dan ramah lingkungan</li>
                                                    </ul>
                                                    <label for="">Misi</label>
                                                    <ul>
                                                        <li>Mengoptimalkan kinerja aparatur pemerintah kelurahan melalui peningkatan kapasitas kelembagaan dan sumber daya aparatur</li>
                                                        <li>Mewujudkan Kualitas Perencanaan Pembangunan, Pengendalian, Evaluasi dan Data/Informasi Pembangunan Kelurahan</li>
                                                        <li>Mengoptimalkan  kualitas pelayanan publik</li>
                                                        <li>Meningkatkan Keamanan dan Ketertiban Masyarakat di wilayah Kelurahan</li>
                                                        <li>Mewujudkan Keberdayaan Sosial Ekonomi Masyarakat Yang Berkualitas</li>
                                                        <li>Mewujudkan Infrastruktur Wilayah Yang Memadai dan Berkualitas serta Ramah Lingkungan.</li>
                                                    </ul>
                                              </div>
                                              
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                          </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
