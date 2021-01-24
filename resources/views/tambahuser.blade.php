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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" style="margin-bottom:10px">
                Tambah User
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
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
                            <option value="1">Lurah</option>
                            <option value="1">Sekertaris Lurah</option>
                        </select>
                        <br>
                        <br>
                        {{-- <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        <a href="" class="btn btn-warning btn-sm">Back</a> --}}
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>            
                    </div>
                </div>
                </div>
            </div>
                
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getUser as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <form action="{{ route('tambahuserdelete', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return myFunction();" class="btn btn-danger btn-sm">Delete</button>
                                </form>
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

            $('#myTable').DataTable();
        } );
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endsection