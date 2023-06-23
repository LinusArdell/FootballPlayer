@extends('layout.main')

@section('Judul')
    Daftar Pemain Bola
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <!-- <div class="d-flex justify-content-between mb-3">
                        <form class="col-lg-6 rounded border-info border d-flex" method="GET">
                            <input type="text" name="search" class="form-control" placeholder="">
                        </form>
                    </div> -->
                    <a href="{{ route('pemain.create') }}" class="mb-3 btn btn-primary">Tambah</a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Pemain</th>
                                    <th>Nomor Punggung</th>
                                    <th>Posisi</th>
                                    <th>Foto</th>
                                    <th>Klub Saat Ini</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPemain as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nomor_punggung }}</td>
                                        <td>{{ $item->posisi }}</td>
                                        <td>
                                            <img style="width: 50px; height: 50px;" class="img-circle"
                                                src="{{ $item->foto ? asset('storage/pemain/'.$item->foto) : asset('assets/images/logo-icon.png') }}">
                                        </td>
                                        <td>{{ $item->klub->nama_klub }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                            <a href="{{ route('pemain.edit', $item->id) }}"><button
                                                        class="btn btn-success mr-2">Edit</button></a>
                                            <form method="POST" class="delete-form" action="{{ route('pemain.destroy', $item->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger show_confirm"><i class="far fa-trash-alt">Delete</i></button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


