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
                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Reset</button>
                        </form>
                    </div>
                    <div class="col-md-1">
                        <form action="{{ route('historypost') }}" method="post">
                            @csrf
                            <input type="hidden" name="date" value="{{ Carbon\Carbon::now() }}">
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        </form>
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
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
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
                name: 'Buruk',
                data: {!! json_encode($data) !!}

            }, {
                name: 'Cukup',
                data: {!! json_encode($data2) !!}

            }, {
                name: 'Baik',
                data: {!! json_encode($data3) !!}

            }, {
                name: 'Sangat Baik',
                data: {!! json_encode($data4) !!}

            }
            ]
        });
    </script>

@endsection