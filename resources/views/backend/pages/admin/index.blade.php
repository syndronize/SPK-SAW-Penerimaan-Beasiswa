@extends('backend.layout.app')
@section('content')
<title>Admin</title>
<div class="container-fluid px-4">
        <h1 class="mt-4">Admin</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Admin
                <a href="{{route('admin.create')}}" class="btn btn-success mb-2">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No. HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $no=>$admin )
                            <tr>
                                <td>{{$no + 1}}</td>
                                <td>{{$admin->nama_admin}}</td>
                                <td>{{$admin->username_admin}}</td>
                                <td>{{$admin->nohp_admin}}</td>
                                <td align="center">
                                    <a href="{{ route('admin.edit', $admin->id_admin) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> </a>
                                    <a href="{{ route('admin.delete', $admin->id_admin) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('admin.delete', $admin->id_admin) }}')"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
