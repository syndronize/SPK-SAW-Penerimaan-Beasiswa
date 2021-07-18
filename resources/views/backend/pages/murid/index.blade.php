@extends('backend.layout.app')
@section('content')
<title>Murid</title>
<div class="container-fluid px-4">
        <h1 class="mt-4">Murid</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Admin
            <a href="{{route('murid.create')}}" class="btn btn-success mb-2">Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Murid</th>
                        <th>NISN</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($murid as $no=>$murid )
                        <tr>
                            <td>{{$no + 1}}</td>
                            <td>{{$murid->nama_murid}}</td>
                            <td>{{$murid->nisn_murid}}</td>
                            <td>{{$murid->jk_murid}}</td>
                            <td>{{$murid->kelas_murid}}</td>
                            <td>{{$murid->nohp_murid}}</td>
                            <td width="15%">
                                <a href="{{ route('kriteria.edit', $murid->id_murid) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                                <a href="{{ route('murid.edit', $murid->id_murid) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('murid.delete', $murid->id_murid) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('murid.delete', $murid->id_murid) }}')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
