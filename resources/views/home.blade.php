@extends('main')

@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Penilaian Warga</li>
            </ol>
        </div>
    </div>

    
    <div class="card">
        <div class="card-title">
            
        </div>
        <div class="card-body">
                    {{-- <div class="container-fluid"> --}}
                @if (Auth::user()->role->name == 'administrator')
                <div class="row">
                    <div class="col-md-1">
                        <!-- Button trigger modal -->
                        
                        <form action="{{ route('resetcurrent') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Reset</button>
                        </form>
                    </div>
                    <div class="col-md-1">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                Simpan
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('historypost') }}" method="post">
                                            @csrf
                                            <input type="text" name="title" class="form-control" required>
                                            {{-- <button type="submit" class="btn btn-success btn-sm">Simpan</button> --}}
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        
                    </div>
                  
                </div>
                @endif
                <div id="container"></div>
        {{-- </div> --}}
    </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Current'
            },
            subtitle: {
                text: 'Source: Penilaian Kelurahan Gandasari'
            },
            xAxis: {
                categories: [
                    'Current'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
            {
                name: 'Sangat Baik',
                data: {!! json_encode($data4) !!}

            },
            {
                name: 'Baik',
                data: {!! json_encode($data3) !!}

            },
            {
                name: 'Cukup',
                data: {!! json_encode($data2) !!}

            },
            {
                name: 'Buruk',
                data: {!! json_encode($data) !!}

            }
            ]
        });
    </script>

@endsection