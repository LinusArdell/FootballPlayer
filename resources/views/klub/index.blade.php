@extends('layout.main')

@section('Judul')
    Daftar Klub Bola
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                     <!-- <form class="col-lg-6 rounded border-info border d-flex" method="GET">
                        <input type="text" name="search" class="form-control" placeholder="">
                    </form> -->
                </div> 
                
                <a href="{{ route('klub.create') }}" class="mb-3 btn btn-primary">Tambah</a>
                {{-- @if (count($pemain)!=0)
                <button class="btn btn-danger" id="multi-delete" data-route="">Delete All Selected</button>
                @endif --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Klub</th>
                                <th>Manajer</th>
                                <th>*</th>
                                <th>Negara</th>
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKlub as $item)
                            <tr>
                                <td> {{ $item->nama_klub }} </td>
                                <td> {{ $item->nama_manager }} </td>
                                <td> <img style="width: 40px" src="{{ $item->logo ? asset('storage/logo/'.$item->logo) : asset('assets/images/logo-icon.png') }}"> </td>
                                <td> {{ $item->negaras->nama_negara }}</td>
                                <td> {{ $item->created_at }} </td>
                                <td>
                                    <form method="POST" class="delete-form" action="{{ route('klub.destroy', $item->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger show_confirm mt-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- {{-- <div class = "mt-4">{{ $mahasiswas ->withQueryString()->links('pagination::bootstrap-5') }}</div> --}} -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection