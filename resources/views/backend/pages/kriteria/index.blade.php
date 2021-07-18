@extends('backend.layout.app')
@section('content')
<title>Kriteria</title>
<div class="container-fluid px-4">
        <h1 class="mt-4">Kriteria</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Kriteria
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Murid</th>
                        <th>Jumlah Tanggungan Orang Tua</th>
                        <th>Pendapatan Orang Tua</th>
                        <th>Rata Rata Nilai Murid</th>
                        <th>Penggunaan Transportasi</th>
                        <th>Nilai Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $no=>$kriteria )
                        <tr>
                            <td>{{$no + 1}}</td>
                            <td>{{$kriteria->nama_murid}}</td>
                            <td>{{$kriteria->tanggungan_kriteria}}</td>
                            <td>{{$kriteria->pendapatan_kriteria}}</td>
                            <td>{{$kriteria->rata_kriteria}}</td>
                            <td>{{$kriteria->transportasi_kriteria}}</td>
                            <td>{{$kriteria->nilai_akhir_kriteria}}</td>
                            <td align="center" width="10%">
                                <a href="{{ route('kriteria.edit', $kriteria->id_kriteria) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> </a>
                                <a href="{{ route('kriteria.delete', $kriteria->id_kriteria) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('kriteria.delete', $kriteria->id_kriteria) }}')"><i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
