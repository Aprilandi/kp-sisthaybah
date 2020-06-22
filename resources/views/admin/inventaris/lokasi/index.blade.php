@extends('templates.default')
@push('style')
{{-- aditional style --}}
@endpush

@section('content')

<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Master Inventaris</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Data Lokasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <!-- Modal -->
    <div id="tambahLokasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambahLokasiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLokasiLabel"><b>Tambah Data Lokasi</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lokasi.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="txtLokasi">Lokasi</label>
                            <input type="text" class="form-control" id="txtLokasi" name="txtLokasi" placeholder="Masukkan Lokasi" required>
                        </div>
                        <div class="form-group">
                            <label for="txtKeterangan">Keterangan</label><br>
                            <textarea class="form-control" rows="4" cols="55" id="txtKeterangan" name="txtKeterangan" placeholder="Masukkan Keterangan"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="editLokasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editLokasiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLokasiLabel"><b>Edit Data Lokasi</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="txtedLokasi">Lokasi</label>
                            <input type="text" class="form-control" id="txtedLokasi" name="txtedLokasi" placeholder="Masukkan Lokasi" required>
                        </div>
                        <div class="form-group">
                            <label for="txtedKeterangan">Keterangan</label><br>
                            <textarea class="form-control" rows="4" cols="55" id="txtedKeterangan" name="txtedKeterangan" placeholder="Masukkan Keterangan"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="card-title">Data Lokasi </h4>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahLokasi">
                                + Tambah
                            </button>
                        </div>
                        {{-- <h6 class="card-subtitle">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code> $().DataTable();</code>. You can refer full documentation from here <a href="https://datatables.net/">Datatables</a></h6> --}}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Lokasi</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        ?>
                                        @foreach($lokasi as $row)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $row->lokasi }}</td>
                                            <td>{{ $row->keterangan }}</td>
                                            <td>
                                                <button class="btn btn-primary" id="edit" href="{{ route('lokasi.update', $row->id_lokasi) }}" data-lokasi="{{ $row->lokasi }}" data-keterangan="{{ $row->keterangan }}">Edit</button>
                                                <button class="btn btn-danger" id="delete" href="{{ route('lokasi.destroy', $row->id_lokasi) }}" data-lokasi="{{ $row->lokasi }}">Hapus</button>
                                            </td>
                                        </tr>
                                        <?php
                                        $number++;
                                        ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="" method="post" id="deleteForm">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
@endsection

@push('scripts')

{{-- aditional JS --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('templates.partials._sweetalert')

<script>
    $('button#delete').on('click', function() {
        var href = $(this).attr('href');
        var name = $(this).data('lokasi');
        Swal.fire({
                title: "Anda yakin untuk menghapus lokasi \"" + name + "\"?",
                text: "Setelah dihapus, data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus'
            })
            .then((willDelete) => {
                if (willDelete.value) {
                    $('#deleteForm').attr('action', href);
                    $('#deleteForm').submit();
                }
            })
    });

    $('button#edit').on('click', function() {
        var lokasi = $(this).data("lokasi");
        var keterangan = $(this).data("keterangan");
        var href = $(this).attr('href');
        $('#txtedLokasi').val(lokasi);
        $('#txtedKeterangan').val(keterangan);
        $('#updateForm').attr('action', href);
        $("#editLokasi").modal('show');
    });
</script>

@endpush