@extends('backend.layout.app')
@section('content')
<title>Form Admin</title>
<div class="container-fluid px-4">
    <h1 class="mt-4"></h1>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Form Pengguna</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($admin) ? route('admin.update', $admin->id_admin) : route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($admin))
                @method('put')
            @endif
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama_admin" type="text" />
                    <label for="nama_admin">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="nohp_admin" type="text" />
                    <label for="nohp_admin">No. HP</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="username_admin" type="text" />
                    <label for="username_admin">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="password_admin" type="password" />
                    <label for="password_admin">Password</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>Submit</button>
                    <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
