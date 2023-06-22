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
                    <div class="d-flex justify-content-between">
                        <form class="col-lg-6 rounded border-info border d-flex" method="GET">
                            <input type="text" name="search" class="form-control" placeholder="">
                        </form>
                    </div>
                    <a href="{{ route('pemain.create') }}" class="btn btn-primary">Tambah</a>

                    @if (count($dataPemain) != 0)
                        <button class="btn btn-danger" id="multi-delete" data-route="{{ route('pemain.multi-delete') }}">Delete All Selected</button>
                    @endif

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
                                        <form method="POST" class="delete-form" action="{{ route('pemain.destroy', $item->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm mt-2"><i class="far fa-trash-alt">Delete</i></button>
                                        </form>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            // Event handler untuk tombol delete
            $('.btn-delete').click(function() {
                var playerId = $(this).data('id');
                // Lakukan proses penghapusan dengan AJAX ke endpoint yang sesuai
                // Contoh menggunakan endpoint '/pemain/delete'
                $.ajax({
                    url: '/pemain/' + playerId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Tampilkan pesan sukses atau lakukan aksi lain yang diinginkan
                        console.log(response);
                    },
                    error: function(xhr) {
                        // Tampilkan pesan error atau lakukan penanganan error yang sesuai
                        console.log(xhr.responseText);
                    }
                });
            });

            // Event handler untuk tombol delete all selected
            $('#multi-delete').click(function() {
                // Mengumpulkan ID pemain yang dipilih
                var selectedIds = [];
                $('input[type=checkbox]:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                // Lakukan proses penghapusan dengan AJAX ke endpoint yang sesuai
                // Contoh menggunakan endpoint '/pemain/multi-delete'
                $.ajax({
                    url: $(this).data('route'),
                    type: 'DELETE',
                    data: {
                        ids: selectedIds,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Tampilkan pesan sukses atau lakukan aksi lain yang diinginkan
                        console.log(response);
                    },
                    error: function(xhr) {
                        // Tampilkan pesan error atau lakukan penanganan error yang sesuai
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
