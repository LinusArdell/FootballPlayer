
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
                {{ Session::get('success')}}
            </div>
            @endif
            <div class="d-flex justify-contentobetween">
                <form class="col-lg-6 rounded border-info border d-flex" method="GET">
                    <input type="text" name="search" class="form-control" placeholder="">
                </form>
            </div>
            <a href="{{ route('pemain.create') }}" class="btn btn-primary">Tambah</a>
{{--
            @if (count($dataPemain) != 0)
            <button class="btn btn-danger" id="multi-delete" data-route="{{ route('player-multi-delete')
            }}">Delete All Selected</button>
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
                        <td> {{ $item->nama }} </td>
                        <td> {{ $item->nomor_punggung }} </td>
                        <td> {{ $item->posisi }} </td>
                        <td> <img style="width: 50px;height:50px;"class="img-circle" src="{{ $item->foto ? asset('storage/pemain/'.$item->foto) : asset('assets/images/logo-icon.png') }}"></td>
                        <td> {{ $item->klub->nama_klub }} </td>

                        <td> {{ $item->created_at }} </td>
                        <td>

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
</div>




 @endsection
