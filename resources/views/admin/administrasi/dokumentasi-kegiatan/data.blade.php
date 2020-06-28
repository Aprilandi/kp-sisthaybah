@extends('templates.default')
@push('style')
{{-- aditional style --}}
@endpush

@section('content')

<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Master Administrasi</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Data Dokumentasi Kegiatan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <!-- Modal -->
    <div id="tambahDokumentasiKegiatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambahDokumentasiKegiatanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDokumentasiKegiatanLabel"><b>Tambah Data Dokumentasi Kegiatan</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kegiatan.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="txtDokumentasiKegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="txtDokumentasiKegiatan" name="txtDokumentasiKegiatan" placeholder="Masukkan Nama Kegiatan" required>
                        </div>
                        <div class="form-group">
                            <label for="txtTempatKegiatan">Tempat Kegiatan</label><br>
                            <input type="text" class="form-control" id="txtTempatKegiatan" name="txtTempatKegiatan" placeholder="Masukkan Keterangan" required>
                        </div>
                        <div class="form-group">
                            <label for="txtTanggalKegiatan">Tanggal Kegiatan</label><br>
                            <input type="date" class="form-control" id="txtTanggalKegiatan" name="txtTanggalKegiatan" placeholder="Masukkan Tanggal Kegiatan" value="{{ $tgl }}" required>
                        </div>
                        <div class="form-group">
                            <label for="txtKeterangan">Keterangan</label><br>
                            <textarea class="form-control" rows="4" cols="55" id="txtKeterangan" name="txtKeterangan" placeholder="Masukkan Keterangan" required></textarea>
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
    <div id="editDokumentasiKegiatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editDokumentasiKegiatanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDokumentasiKegiatanLabel"><b>Edit Data Dokumentasi Kegiatan</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="txtedDokumentasiKegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="txtedDokumentasiKegiatan" name="txtedDokumentasiKegiatan" placeholder="Masukkan Nama Kegiatan" required>
                        </div>
                        <div class="form-group">
                            <label for="txtedTempatKegiatan">Tempat Kegiatan</label><br>
                            <input type="text" class="form-control" id="txtedTempatKegiatan" name="txtedTempatKegiatan" placeholder="Masukkan Keterangan" required>
                        </div>
                        <div class="form-group">
                            <label for="txtedTanggalKegiatan">Tanggal Kegiatan</label><br>
                            <input type="date" class="form-control" id="txtedTanggalKegiatan" name="txtedTanggalKegiatan" placeholder="Masukkan Tanggal Kegiatan" required>
                        </div>
                        <div class="form-group">
                            <label for="txtedKeterangan">Keterangan</label><br>
                            <textarea class="form-control" rows="4" cols="55" id="txtedKeterangan" name="txtedKeterangan" placeholder="Masukkan Keterangan" required></textarea>
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
                            <h4 class="card-title">Data Dokumentasi Kegiatan </h4>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDokumentasiKegiatan">
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
                                            <th>Nama Kegiatan</th>
                                            <th>Tempat Kegiatan</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        ?>
                                        @foreach($dokumentasi_kegiatan as $row)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $row->nama_kegiatan }}</td>
                                            <td>{{ $row->tempat_kegiatan }}</td>
                                            <td>{{ $row->tanggal_kegiatan }}</td>
                                            <td>{{ $row->keterangan }}</td>
                                            <td>
                                                <button class="btn btn-primary" id="edit" href="{{ route('kegiatan.update', $row->id_dokumentasi_kegiatan) }}" data-nama="{{ $row->nama_kegiatan }}" data-tempat="{{ $row->tempat_kegiatan }}" data-tanggal="{{ $row->tanggal_kegiatan }}" , data-keterangan="{{ $row->keterangan }}">Edit</button>
                                                <button class="btn btn-danger" id="delete" href="{{ route('kegiatan.destroy', $row->id_dokumentasi_kegiatan) }}" data-nama="{{ $row->nama_kegiatan }}">Hapus</button>
                                                <button class="btn btn-secondary" id="detail" href="{{ route('detail.index', $row->id_dokumentasi_kegiatan) }}">Detail Dokumen</button>
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
        var name = $(this).data('nama');
        Swal.fire({
                title: "Anda yakin untuk menghapus Dokumentasi Kegiatan \"" + name + "\"?",
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
        var nama = $(this).data("nama");
        var tempat = $(this).data("tempat");
        var tanggal = $(this).data("tanggal");
        var keterangan = $(this).data("keterangan");
        var href = $(this).attr('href');
        $('#txtedDokumentasiKegiatan').val(nama);
        $('#txtedTempatKegiatan').val(tempat);
        $('#txtedTanggalKegiatan').val(tanggal);
        $('#txtedKeterangan').val(keterangan);
        $('#updateForm').attr('action', href);
        $("#editDokumentasiKegiatan").modal('show');
    });

    $('button#detail').on('click', function() {
        var href = $(this).attr('href');
        window.location.href = href;
    });
</script>

@endpush