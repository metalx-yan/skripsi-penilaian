<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Penilaian Kelurahan Gandasari</h4>
		<h6><br></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
                <th>Nama</th>
                <th>Penilaian</th>
                <th>Grade</th>
                <th>Komentar</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($penilaian as $item)
			<tr>
				<td>{{ $i++ }}</td>
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
                <td>{{  $item->soal5 }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>