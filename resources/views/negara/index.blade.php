@extends('layout.main')

@section('Judul')
    List Negara Tersedia
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <form class="col-lg-6 rounded border-info border d-flex" method="GET">
                            <input type="text" name="search" class="form-control" placeholder="">
                        </form>
                    </div>
                    <a href="{{ route('negara.create') }}" class="btn btn-primary">Tambah</a>

                    {{-- @if (count($dataNegara) != 0)
                        <button class="btn btn-danger" id="multi-delete" data-route="">Delete All Selected</button>
                    @endif --}}

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Negara</th>
                                    <th>Bendera</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataNegara as $item)
                                    <tr>
                                        <td>{{ $item->nama_negara }}</td>
                                        <td> <img style="width: 50px;height:50px;"class="img-circle" src="{{ $item->bendera ? asset('storage/bendera/'.$item->bendera) : asset('assets/images/logo-icon.png') }}">  </td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- {{-- <div class="mt-4">{{ $mahasiswas->withQueryString()->links('pagination::bootstrap-5') }}</div> --}} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
