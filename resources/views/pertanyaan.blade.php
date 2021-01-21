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

        /* .container { 
            margin: 100px 400px; 
        } 
  
        .no-box { 
            padding-left: 30px; 
            font-size: 12px; 
        } 
  
        .btn { 
            background-color: rgb(179, 179, 179); 
        } 
  
        .btn:hover { 
            color: white; 
            background-color: green; 
        }  */
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header header" >{{ __('Daftar Sebelum Isi Pertanyaan') }}</div>
                
                                <div class="card-body">
                                        <div style="justify-content:center; display:flex;font-weight:bold; font-size: 29px; color:black;">SELAMAT DATANG</div> 
                                        <hr>
                                        {{-- <div class="no-box">  --}}
                                            <button class="btn btn-primary btn-sm pertanyaan" onclick="next()">Mulai isi pertanyaan</button>
                                        {{-- </div>  --}}
                                        
                                    <form action="{{ route('storeCreate2') }}" method="post">
                                        @csrf
                                        <div id="content1">1. Bagaimana daya tanggal staff pelayanan?<br> <br> 
                                            <input type="radio" name="pertama" value="60"> Sangat buruk<br>
                                            <input type="radio" name="pertama" value="70"> Buruk<br>
                                            <input type="radio" name="pertama" value="80"> Cukup<br>
                                            <input type="radio" name="pertama" value="90"> Baik<br>
                                            <input type="radio" name="pertama" value="100"> Sangat baik
                                        </div>
                                        <div id="content2">2. Bagaimana tingkat empati staff pelayanan? <br> <br> 
                                            <input type="radio" name="kedua" value="60"> Sangat buruk<br>
                                            <input type="radio" name="kedua" value="70"> Buruk<br>
                                            <input type="radio" name="kedua" value="80"> Cukup<br>
                                            <input type="radio" name="kedua" value="90"> Baik<br>
                                            <input type="radio" name="kedua" value="100"> Sangat baik
                                        </div>
                                        <div id="content3">3. Berikan tanda ceklis pada pernyataan yang sesuai! <br> <br> 
                                            <input type="checkbox" name="ketiga[]" value="25"> Staff pelayanan selalu terlihat rapi <br>
                                            <input type="checkbox" name="ketiga[]" value="25"> Staff pelayanan selalu menggunakan masker<br>
                                            <input type="checkbox" name="ketiga[]" value="25"> Kebersihan area staff pelayanan selalu terjaga<br>
                                            <input type="checkbox" name="ketiga[]" value="25"> Staff pelayanan menyediakan hand sanitizer untuk warga yang datang               
                                        </div>
                                        <div id="content4">4. Berikan tanda ceklis pada pernyataan yang sesuai! <br> <br> 
                                            <input type="checkbox" name="keempat[]" value="25"> Staff pelayanan memberikan pelayanan dengan tepat dan cepat <br>
                                            <input type="checkbox" name="keempat[]" value="25"> Staff pelayanan mampu menjelaskan apa yang diperlukan warga dengan baik<br>
                                            <input type="checkbox" name="keempat[]" value="25"> Staff pelayanan melayani warga dengan ramah<br>
                                            <input type="checkbox" name="keempat[]" value="25"> Informasi yang diberikan sesuai dengan aturan           
                                        </div>
                                        <div id="content5">5. Form komentar dan saran tambahan<br> <br> 
                                            <textarea name="kelima" id="" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                        
                        
                                        <hr>
                        
                                        <button type="button" class="btn" onclick="prev()"> 
                                            Prev
                                        </button> 
                                        <button type="button" class="btn" onclick="next()"> 
                                            Next 
                                        </button> 

                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src=" {{ asset('assets/plugins/jquery/jquery.min.js') }} "></script>

     <script>
         
            var no_box = document 
            .querySelector('.no-box'); 
            var i = 0; 
            var soal = '';
            $("#content1").hide();
            $("#content2").hide();
            $("#content3").hide();
            $("#content4").hide();
            $("#content5").hide();
        function prev() { 
            if (i == 1) { 
                document.getElementsByClassName( 
                        'prev').disabled = true; 
                document.getElementsByClassName( 
                        'next').disabled = false; 
                        document.getElementsByClassName( 
                        'pertanyaan').disabled = false; 
                                        
            } else { 
                i--; 
                soal = '';
                $("#content2").hide();
                $("#content1").hide();
                $("#content3").hide();
                $("#content4").hide();
                $("#content5").hide();
                return setNo(); 
            } 
        } 
  
        function next() { 
            if (i == 5) { 
                document.getElementsByClassName( 
                        'next').disabled = true;                
                document.getElementsByClassName( 
                        'prev').disabled = false; 
                 
            } else { 
                i++; 
                soal = '';
                $("#content2").hide();
                $("#content1").hide();
                $("#content3").hide();
                $("#content4").hide();
                $("#content5").hide();
                return setNo(); 
            } 
        } 
  
        function setNo() { 
            if(i == 2){
            	soal = $("#content2").html();
                $("#content2").show();
            }else if(i == 1){
                soal = $("#content1").html();
                $("#content1").show();
                $(".pertanyaan").hide();
            }else if(i == 3){
                soal = $("#content3").html();
                $("#content3").show();
            }else if(i == 4){
                soal = $("#content4").html();
                $("#content4").show();
            }else if(i == 5){
                soal = $("#content5").html();
                $("#content5").show();
            }
                return no_box.innerHTML = i + soal; 
        } 
</script>
    </body>
</html>
