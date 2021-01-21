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
            <table id="myTable">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Penilaian</th>
                        <th>Grade</th>
                        <th>Action</th>
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
                            <td>
                                @if (Auth::user()->role->name == 'administrator')
                                    
                                <form action="{{ route('delete-history', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return myFunction();" class="btn btn-danger btn-sm">Delete</button>    
                                </form>
                                
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function myFunction() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }

        $(document).ready( function () {
            var table = $('#myTable').DataTable();

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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

@endsection