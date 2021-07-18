@extends('backend.layout.app')
@section('content')
<title>Form Murid</title>
<div class="container-fluid px-4">
    <h1 class="mt-4"></h1>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Form Murid</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($murid) ? route('murid.update', $murid->id_murid) : route('murid.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($murid))
                @method('put')
            @endif
                <div class="form-floating mb-3">
                    <input class="form-control  @error('nama_murid') {{ 'is-invalid' }} @enderror" name="nama_murid" type="text"
                    value="{{ old('nama_murid') ?? $murid->nama_murid ?? ''}}"/>
                    <label for="nama_murid">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control @error('nisn_murid') {{ 'is-invalid' }} @enderror" name="nisn_murid" type="text" value="{{ old('nisn_murid') ?? $murid->nisn_murid ?? ''}}"/>
                    <label for="nisn_murid">NISN</label>
                </div>
                <div class="mb-3">
                <select name="jk_murid" id="jk_murid" class="form-select" aria-label="Default select example">Jenis Kelamin
                <option value="" disabled select selected>-Pilih Jenis Kelamin-</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                </select>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control @error('kelas_murid') {{ 'is-invalid' }} @enderror" name="kelas_murid" type="text" value="{{ old('kelas_murid') ?? $murid->kelas_murid ?? ''}}"/>
                    <label for="kelas_murid">Kelas</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control @error('nohp_murid') {{ 'is-invalid' }} @enderror" name="nohp_murid" type="text"
                    value="{{ old('nohp_murid') ?? $murid->nohp_murid ?? '+62'}}"/>
                    <label for="nohp_murid">No. HP</label>
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
