@extends('layout.mainA')

@section('Judul')
    Daftar Pemain Bola
@endsection

@section('subJudul')
    Create List Negara
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

                    <form class="forms-sample" action="{{ route('negara.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputNation">Nama negara</label>
                            <input type="text" class="form-control" name="nama_negara" placeholder="Nama Negara">
                            @error('nama_negara')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="foto">Bendera</label>
                            <input type="file" class="form-control" name="bendera" placeholder="Masukan Flag">
                            @error('bendera')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ route('negara.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
