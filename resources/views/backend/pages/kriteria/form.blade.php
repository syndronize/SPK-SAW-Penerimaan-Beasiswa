@extends('backend.layout.app')
@section('content')
<title>Form Kriteria</title>
<div class="container-fluid px-4">
    <h1 class="mt-4"></h1>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Form Kriteria Penilaian</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($kriteria) ? route('kriteria.update', $kriteria->id_kriteria) : route('kriteria.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($kriteria))
                @method('put')
            @endif
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama_admin" value="{{$kriteria->nama_murid}}" disabled/>
                    <label for="nama_admin">Nama Murid</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="tanggungan_kriteria" type="number" />
                    <label for="tanggungan_kriteria">Jumlah Tanggungan Orang Tua</label>
                </div>
                <div class="mb-3">
                    <select name="pendapatan_kriteria" id="pendapatan_kriteria" class="form-select" aria-label="Default select example">x
                        <option value="" disabled select selected>Pendapatan Orang Tua</option>
                        <option value="10">Rp.0 - Rp.1.000.000</option>
                        <option value="20">Rp.1.000.001 - Rp.1.500.000</option>
                        <option value="30">Rp.1.500.001 - Rp.2.500.000</option>
                        <option value="40">Rp.2.500.001 - Rp.3.500.000</option>
                        <option value="50">Rp.3.500.001 - Rp.4.500.000</option>
                        <option value="60">Rp.4.500.001 - Rp.5.500.000</option>
                        <option value="70">Rp.5.500.001 - Rp.6.500.000</option>
                        <option value="80">Rp.7.500.001 - Rp.8.500.000</option>
                        <option value="90">Rp.9.500.001 - Rp.10.500.000</option>
                        <option value="100">>Rp.10.500.000</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="rata_kriteria" type="number" />
                    <label for="rata_kriteria">Rata-Rata Nilai Siswa</label>
                </div>
                <div class="mb-3">
                    <select name="transportasi_kriteria" id="transportasi_kriteria" class="form-select" aria-label="Default select example">
                        <option value="" disabled select selected>Transportasi Yang Digunakan</option>
                        <option value="60">Jalan Kaki</option>
                        <option value="55">Ojek</option>
                        <option value="55">Kendaraan Pribadi</option>
                    </select>
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
