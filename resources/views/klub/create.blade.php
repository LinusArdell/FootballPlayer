@extends('layout.mainA')
@section('Judul')
    Daftar Klub Bola
@endsection
@section('subJudul')
    Create List Klub
@endsection

@section('content')

<div class="col">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <h4 class="card-title">Input Negara to List</h4>
                    <p class="card-description">Tambah List baru</p>

                    <form class="forms-sample" action="{{ route('klub.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_klub">Nama Klub</label>
                            <input type="text" class="form-control" name="nama_klub" placeholder="Nama Klub Bola">
                            @error('nama_klub')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_manager">Nama Manager</label>
                            <input type="text" class="form-control" name="nama_manager" placeholder="Nama Manager">
                            @error('nama_manager')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="logo">Logo Club</label>
                            <input type="file" class="form-control" name="logo" placeholder="Masukan logo Club">
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="asalNegara">Asal Negara</label>
                            <select name="negara_id" class="form-select js-example-basic-single" aria-label="Default select example" placeholder="Pilih Negara">
                                @foreach ($dataNegara as $item)

                                <option  value="{{ $item['id'] }}">{{ $item['nama_negara']}}
                                        
                                </option>

                                @endforeach
                            </select>
                            @error('nama_negara')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ route('klub.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
