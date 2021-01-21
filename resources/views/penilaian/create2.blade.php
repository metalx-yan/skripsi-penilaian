@extends('main')

@section('link')
    <style>
         .container { 
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
        } 
    </style>
@endsection

@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Penilaian</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
        </div>
        <div class="card-body">
                <div style="justify-content:center; display:flex;font-weight:bold; font-size: 29px; color:black;">SELAMAT DATANG</div> 
                <hr>
                {{-- <div class="no-box"> 
                    <span class="no"></span> 
                </div>  --}}
                

                <div id="content1">1. Bagaimana daya tanggal staff pelayanan?<br> <br> 
                    <input type="radio" name="pertama"> Sangat buruk<br>
                    <input type="radio" name="pertama"> Buruk<br>
                    <input type="radio" name="pertama"> Cukup<br>
                    <input type="radio" name="pertama"> Baik<br>
                    <input type="radio" name="pertama"> Sangat baik
                </div>
                <div id="content2">2. Bagaimana tingkat empati staff pelayanan? <br> <br> 
                    <input type="radio" name="kedua"> Sangat buruk <br>
                    <input type="radio" name="kedua"> Buruk<br>
                    <input type="radio" name="kedua"> Cukup<br>
                    <input type="radio" name="kedua"> Baik<br>
                    <input type="radio" name="kedua"> Sangat baik
                </div>
                <div id="content3">3. Berikan tanda ceklis pada pernyataan yang sesuai! <br> <br> 
                    <input type="checkbox" name="ketiga[]"> Staff pelayanan selalu terlihat rapi <br>
                    <input type="checkbox" name="ketiga[]"> Staff pelayanan selalu menggunakan masker<br>
                    <input type="checkbox" name="ketiga[]"> Kebersihan area staff pelayanan selalu terjaga<br>
                    <input type="checkbox" name="ketiga[]"> Staff pelayanan menyediakan hand sanitizer untuk warga yang datang               
                </div>
                <div id="content4">4. Berikan tanda ceklis pada pernyataan yang sesuai! <br> <br> 
                    <input type="checkbox" name="keempat[]"> Staff pelayanan memberikan pelayanan dengan tepat dan cepat <br>
                    <input type="checkbox" name="keempat[]"> Staff pelayanan mampu menjelaskan apa yang diperlukan warga dengan baik<br>
                    <input type="checkbox" name="keempat[]"> Staff pelayanan melayani warga dengan ramah<br>
                    <input type="checkbox" name="keempat[]"> Informasi yang diberikan sesuai dengan aturan           
                </div>
                <div id="content5">5. Form komentar dan saran tambahan<br> <br> 
                    <textarea name="kelima" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>

                <hr>

                <button class="btn" onclick="prev()"> 
                    Prev
                </button> 
                <button class="btn" onclick="next()"> 
                    Next 
                </button> 
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

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

@endsection