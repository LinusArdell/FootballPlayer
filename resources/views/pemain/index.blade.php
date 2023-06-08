
      @extends('layout.main')
@section('Judul')
    Daftar Pemain Bola
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
            <a href="{{ route('pemain.create') }}" class="btn btn-primary">Tambah</a>

            {{-- @if (count($pemain)!=0)<
                <button class="btn btn-danger" id="multi-delete" data-route="">Delete All Selected</button>
            @endif --}}


          <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Nama Pemain</th>
                        <th>nomor Punggung</th>
                        <th>Posisi</th>
                        <th>Foto</th>
                        <th>Klub Saat Ini</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPemain as $item)
                    <tr>
                        <td> {{ $item->nama }} </td>
                        <td> {{ $item->nomor_punggung }} </td>
                        <td> {{ $item->posisi }} </td>
                        <td> {{ $item->klub->nama_klub }} </td>
                        <td> {{ $item->foto }} </td>
                        <td> {{ $item->created_at }} </td>
                        <td>
                            <div></div>
                            <a href="{{ route('pemain.edit',$item->id) }}">
                            <button class ="btn btn-success btn-sm">Edit</button></a>
                            <form method="post" class="delete-form" data-route="{{ route('pemain.destroy',$item->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
                </tbody>
            </table>
            {{-- <div class = "mt-4">{{ $mahasiswas ->withQueryString()->links('pagination::bootstrap-5') }}</div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

        @endsection
