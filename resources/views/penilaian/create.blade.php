@extends('main')

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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-title">
            
        </div>
        <div class="card-body">
            
            <form>
                <label for="">NIK</label>
                <input name="nik" type="text" pattern=".{5,10}" class="form-control" required>
                <label for="">Nama</label>
                <input name="name" type="text" class="form-control" required>
                <br>
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                <a href="" class="btn btn-warning btn-sm">Back</a>
            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection