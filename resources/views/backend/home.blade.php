@extends('backend.layout.app')
@section('content')
<title>Home</title>
<div class="container-fluid px-4">
    <h1 class="mt-4">Ranking</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Rangking Penerimaan Beasiswa
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $no=>$kriteria )
                    <tr>
                        <td width="1%">{{$no + 1}}</td>
                        <td>{{$kriteria->nama_murid}}</td>
                        <td>{{$kriteria->nisn_murid}}</td>
                        <td>{{$kriteria->kelas_murid}}</td>
                        <td>{{$kriteria->nilai_akhir_kriteria}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
