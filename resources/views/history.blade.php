@extends('main')


@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">History</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
            
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Filter Berdasarkan Grade</label>
                    <select id="dropdown1" class="form-control">
                        <option value="">Pilih Grade</option>
                        <option value="sangat baik">Sangat Baik</option>
                        <option value="baik.">Baik</option>
                        <option value="cukup">Cukup</option>
                        <option value="buruk">Buruk</option>
                    </select>
                </div>
                <div class="col-md-8">

                </div>
            </div>
            <br>
            <a href="{{ Auth::user()->role->name == 'user' ? route('pdfi') : route('pdf') }}" class="btn btn-primary btn-sm" target="_blank" style="margin-bottom:20px;">PDF</a>
            <table id="myTable" >
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Penilaian</th>
                        <th>Grade</th>
                        <th>Komentar</th>
                        @if (Auth::user()->role->name == 'administrator')
                            
                        <th>Action</th>
                        @else
                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ ($item->soal1 + $item->soal2 + $item->soal3 + $item->soal4)/4 }}</td>
                            <td> @if ($item->grade == 'sangat baik')
                                Sangat Baik
                            @elseif ($item->grade == 'baik')
                            Baik.
                            @elseif ($item->grade == 'cukup')
                            Cukup
                            @elseif ($item->grade == 'buruk')
                            Buruk
                            @endif
                              
                            </td>
                            <td>{{  str_word_count($item->soal5) > 3 ? substr($item->soal5,0,2)."[..]" : $item->soal5 }}</td>
                            
                            @if (Auth::user()->role->name == 'administrator')
                            <td>
                                    
                                <form action="{{ route('delete-history', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return myFunction();" class="btn btn-danger btn-sm">Delete</button>    
                                </form>

                            </td>
                            @else
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        function myFunction() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }

        $(document).ready( function () {
            var table = $('#myTable').DataTable({
                
                // table.fnSetColumnVis( 1, false ); 
            });

            $('#dropdown1').on('change', function () {
                var val = this.value;

                if (val == 'baik') {
                    table.columns(3).search('baik').draw(false);
                } 
                    table.columns(3).search( val ).draw();

                console.log(val);
            });
        } );


    </script>
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script> --}}

@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    
</head>
<body>
        <table id="table-datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>12</th>
                    <th>13</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>awd</td>
                    <td>awd</td>
                    <td>awdaw</td>
                </tr>
            </tbody>
        </table>
        <script src=" {{ asset('assets/plugins/jquery/jquery.min.js') }} "></script>

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
        <script type="text/javascript"> 
            $(document).ready(function () {
                $('#table-datatables').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                });
            });
        </script>
</body>
</html> --}}