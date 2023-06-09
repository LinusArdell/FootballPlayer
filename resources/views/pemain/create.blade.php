@extends('layout.mainA')
@section('Judul')
    Daftar Pemain Bola
@endsection
@section('subJudul')
    Create Pemain
@endsection

@section('content')
<div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <h4 class="card-title">Input Pemain to List</h4>
                    <p class="card-description">Tambah List baru</p>

                    <form class="forms-sample" action="{{ route('pemain.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Pemain</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Pemain Bola">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nomor_punggung">Nomor Punggung</label>
                            <input type="text" class="form-control" name="nomor_punggung" placeholder="Nomor Punggung">
                            @error('nomor_punggung')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="posisi">Posisi Pemain</label>
                            <input type="text" class="form-control" name="posisi" placeholder="Posisi Pemain">
                            @error('posisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="foto">Foto Pemain</label>
                            <input type="file" class="form-control" name="foto" placeholder="Input Foto Pemain">
                            @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="prodiselect">Klub Saat ini</label>
                            <select name="klub_id" class="form-select js-example-basic-single" aria-label="Default select example" placeholder="Pilih Klub">
                                @foreach ($dataKlub as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['nama_klub'] }}</option>
                                @endforeach
                            </select>
                            @error('nama_klub')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--  -->

                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ route('pemain.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
