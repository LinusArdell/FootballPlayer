@extends('layout.mainA')
@section('Judul')
    Daftar Klub Bola
@endsection
@section('subJudul')
    Create List Klub
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-contentobetween">
                    <form class="col-lg-6 rounded border-info border d-flex" method="GET">
                        <input type="text" name="search" class="form-control" placeholder="">
                    </form>
                </div>
                <a href="{{ route('') }}" class="btn btn-primary">Tambah</a>

                {{-- @if (count($pemain)!=0)<
                <button class="btn btn-danger" id="multi-delete" data-route="{{ route('mhs-multi-delete') }}">Delete All Selected</button>
                @endif --}}

                <!-- ============================================================== -->
                <!--                    Batas Suci          content Showing -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pemain</th>
                                <th>Nomor Punggung</th>
                                <th>Posisi</th>
                                <th>Foto</th>
                                <th>Klub Saat Ini</th>
                                <th>Asal Negara</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($pemain as $item)
                            <tr>
                                <td> {{ $item->nama }} </td>
                                <td> {{ $item->nomor_punggung }} </td>
                                <td> {{ $item->posisi }} </td>
                                <td> {{ $item->klub_id}} </td>
                                <td> <img src="{{ $item->foto ? asset('storage/'.$item->foto) : asset('images/faces/face5.jpg') }}">  </td>
                                <td> {{ $item->negara }}</td>
                                <td> {{ $item->created_at }} </td>
                                <td>
                                    <div></div>
                                    <a href="{{ route('pemain.edit',$item->id) }}">
                                        <button class ="btn btn-success btn-sm">Edit</button>
                                    </a>
                                    <form method="post" class="delete-form" data-route="{{ route('mahasiswa.destroy',$item->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                    {{-- <div class = "mt-4">{{ $mahasiswas ->withQueryString()->links('pagination::bootstrap-5') }}</div> --}}
                </div>
                <!--                    Batas Suci          content Showing -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
</div>

@endsection
