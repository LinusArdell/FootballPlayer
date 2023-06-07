@extends('layout.mainA')
@section('Judul')
          Daftar Pemain Bola
@endsection
@section('subJudul')
          Create List Negara
@endsection

 @section('content')

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>

        @else

        @endif
        <h4 class="card-title">Input Negara to List</h4>
        <p class="card-description">
          Tambah List baru
        </p>
        <form class="forms-sample" action="{{ route('negara.store') }}" method="POST">
          @csrf
        </div>
    </div>
        <div class="card">
            <div class="card-body">


          <div class="form-group">
            <label for="exampleInputEmail1">Nama negara</label>
            <input type="text" class="form-control" name="negara" placeholder="Nama Negara">
            @error('negara')
            <span class="text-danger">{{ $message }}</span>
            @enderror

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Bendera</label>
            <input type="text" class="form-control" name="bendera" placeholder="Bendera">

            @error('bendera')
            <span class="text-danger">{{ $message }}</span>
            @enderror

          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <a href="{{ route('pemain.index') }}" class="btn btn-light">Cancel</button>
        </form>
    </div>
    </div>
  </div>


              @endsection
