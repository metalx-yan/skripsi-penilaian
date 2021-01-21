@extends('main')

@section('content')
<div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Tambah User</li>
                </ol>
            </div>
        </div>
        <div class="card">
        <div class="card-title">
            
        </div>
        <div class="card-body">
            
            <form method="POST" action="{{ route('tambahuserpost') }}">
                @csrf
                <label for="">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="">Username</label>
                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label for="">Hak Akses</label>
                <select name="role" id="" class="form-control">
                    <option value="">Pilih Hak Akses</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
                <br>
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                <a href="" class="btn btn-warning btn-sm">Back</a>
            </form>

        </div>
    </div>
</div>
    
@endsection