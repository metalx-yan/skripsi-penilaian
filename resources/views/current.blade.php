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
                    <form action="{{ route('currentdelete', $item->month) }}" method="post">
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

        var fruits = {!! json_encode($date) !!};
        let sangat = {!! json_encode($sangat) !!};
        let baik = {!! json_encode($baik) !!};
        let cukup = {!! json_encode($cukup) !!};
        let buruk = {!! json_encode($buruk) !!};
        

        fruits.forEach(myFunction);

        function myFunction(item, index) {
            console.log(fruits);

        Highcharts.chart('container'+index, {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Historical'
            },
            subtitle: {
                text: 'Source: Penilaian Kelurahan Gandasari'
            },
            xAxis: {
                categories: [
                    fruits[index]
                    
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
                    name : (sangat[index].length != 0 ? sangat[index][0].grade : 'Sangat Baik'),
                    data : (sangat[index].length != 0 ? [parseInt(sangat[index][0].total)] : [0])
                },
                {
                    name : (baik[index].length != 0 ? baik[index][0].grade : 'Baik'),
                    data : (baik[index].length != 0 ? [parseInt(baik[index][0].total)] : [0])
                },
                
                {
                    name : (cukup[index].length != 0 ? cukup[index][0].grade : 'Cukup'),
                    data : (cukup[index].length != 0 ? [parseInt(cukup[index][0].total)] : [0])
                },
                
                {
                    name : (buruk[index].length != 0 ? buruk[index][0].grade : 'Buruk'),
                    data : (buruk[index].length != 0 ? [parseInt(buruk[index][0].total)] : [0])
                },                

                // sangat[index].length != 0 ? { name: sangat[index][0].grade,data: [parseInt(sangat[index][0].total)]} : { name: 'Baik',data: [0]}

                
                
                

                     
            ]
        });
            // let data = '';
            // if (sangat[index].length != 0) {
            //     data = "{name: sangat[index][0].grade, data: [parseInt(sangat[index][0].total)]}";
            //     console.log(this.series.push(data));
            // } 
    }

    </script>

@endsection