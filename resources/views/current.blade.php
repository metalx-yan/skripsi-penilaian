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
            <figure class="highcharts-figure">
                @php
                    $no = 0;
                @endphp
                @foreach ($bulan as $item)
                    @if (Auth::user()->role->name == 'administrator') 
                    <form action="{{ route('currentdelete', $item->tahap) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endif
                    <div id="container{{$no++}}"></div>
                    
                    <hr>
                @endforeach
               
            </figure>
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

var datas = {!! json_encode($kak) !!};
var tah = {!! json_encode($tah) !!};
var data1 = {!! json_encode($data1) !!};
var data2 = {!! json_encode($data2) !!};
var data3 = {!! json_encode($data3) !!};
var data4 = {!! json_encode($data4) !!};
datas.sort().reverse();
datas.forEach(myFunction);

function myFunction(item, index) {
    console.log([data2[index].tahap]);
    Highcharts.chart('container'+index, {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Historical'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                    tah[index]
                ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
            data: [parseInt(data1[index].total)]
        },
        {
            name: 'Baik',
            data: [parseInt(data2[index].total)]
        }
        ,
        {
            name: 'Cukup',
            data: [parseInt(data3[index].total)]
        },
        {
            name: 'Buruk',
            data: [parseInt(data4[index].total)]
        }
        
        
        ]
    });

}

    </script>

@endsection