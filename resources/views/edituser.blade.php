@extends('main')

@section('content')
<div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
        </div>
        <div class="card">
        <div class="card-title">
            
        </div>
        <div class="card-body">
            <form action="{{ route('updateuser', $edit->id) }}" method="post">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-4">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $edit->name }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $edit->username }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Hak Akses</label>
                        <select name="hakakses" id="" class="form-control" required>
                            <option value="">Pilih Hak Akses</option>
                            <option value="1" {{ $edit->role->id == 1 ? 'selected' : '' }}>Administrator</option>
                            <option value="2" {{ $edit->role->id == 2 ? 'selected' : '' }} >User</option>
                        </select>
                    </div>

                </div>
                <br>
                    <button type="submit" class="btn btn-success btn-sm">Edit</button>
                    <a href="{{ route('tambahuser') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
     
    </div>
</div>
@endsection