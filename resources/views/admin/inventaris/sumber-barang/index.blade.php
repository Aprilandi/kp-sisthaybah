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
                    <li class="breadcrumb-item active" aria-current="page">Data Sumber Barang</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <!-- Modal -->
    <div id="tambahSumberBarang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambahSumberBarangLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSumberBarangLabel"><b>Tambah Data Sumber Barang</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sumberbarang.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="txtSumberBarang">Sumber Barang</label>
                            <input type="text" class="form-control" id="txtSumberBarang" name="txtSumberBarang" placeholder="Masukkan Sumber Barang" required>
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
    <div id="editSumberBarang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editSumberBarangLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSumberBarangLabel"><b>Edit Data Sumber Barang</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="txtedSumberBarang">Sumber Barang</label>
                            <input type="text" class="form-control" id="txtedSumberBarang" name="txtedSumberBarang" placeholder="Masukkan Sumber Barang" required>
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
                            <h4 class="card-title">Data Sumber Barang </h4>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSumberBarang">
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
                                            <th>Sumber Barang</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        ?>
                                        @foreach($sumber_barang as $row)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $row->sumber_barang }}</td>
                                            <td>{{ $row->keterangan }}</td>
                                            <td>
                                                <button class="btn btn-primary" id="edit" href="{{ route('sumberbarang.update', $row->id_sumber_barang) }}" data-sumber="{{ $row->sumber_barang }}" data-keterangan="{{ $row->keterangan }}">Edit</button>
                                                <button class="btn btn-danger" id="delete" href="{{ route('sumberbarang.destroy', $row->id_sumber_barang) }}" data-sumber="{{ $row->sumber_barang }}">Hapus</button>
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
        var name = $(this).data('sumber');
        Swal.fire({
                title: "Anda yakin untuk menghapus sumber barang \"" + name + "\"?",
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
        var sumber = $(this).data("sumber");
        var keterangan = $(this).data("keterangan");
        var href = $(this).attr('href');
        $('#txtedSumberBarang').val(sumber);
        $('#txtedKeterangan').val(keterangan);
        $('#updateForm').attr('action', href);
        $("#editSumberBarang").modal('show');
    });
</script>

@endpush