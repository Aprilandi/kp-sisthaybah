@extends('templates.default')
@push('style')
{{-- aditional style --}}
@endpush

@section('content')

<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Master Keuangan</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Data Biaya</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <!-- Modal -->
    <div id="tambahBiaya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambahBiayaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBiayaLabel"><b>Tambah Data Biaya</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('biaya.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="txtNamaBiaya">Nama Biaya</label>
                            <input type="text" class="form-control" id="txtNamaBiaya" name="txtNamaBiaya" placeholder="Masukkan Nama Biaya" required>
                        </div>
                        <div class="form-group">
                            <label for="txtJumlah">Jumlah Biaya</label><br>
                            <input type="number" class="form-control" id="txtJumlah" name="txtJumlah" placeholder="Masukkan Jumlah Biaya" required>
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
    <div id="editBiaya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editBiayaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBiayaLabel"><b>Edit Data Biaya</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="txtedNamaBiaya">Nama Biaya</label>
                            <input type="text" class="form-control" id="txtedNamaBiaya" name="txtedNamaBiaya" placeholder="Masukkan Nama Biaya" required>
                        </div>
                        <div class="form-group">
                            <label for="txtedJumlah">Jumlah Biaya</label><br>
                            <input type="number" class="form-control" id="txtedJumlah" name="txtedJumlah" placeholder="Masukkan Jumlah Biaya" required>
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
                            <h4 class="card-title">Data Biaya </h4>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBiaya">
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
                                            <th>Nama biaya</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        ?>
                                        @foreach($biaya as $row)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $row->nama_biaya }}</td>
                                            <td>{{ $row->jumlah }}</td>
                                            <td>
                                                <button class="btn btn-primary" id="edit" href="{{ route('biaya.update', $row->id_biaya) }}" data-nama="{{ $row->nama_biaya }}" data-jumlah="{{ $row->jumlah }}">Edit</button>
                                                <button class="btn btn-danger" id="delete" href="{{ route('biaya.destroy', $row->id_biaya) }}" data-nama="{{ $row->nama_biaya }}">Hapus</button>
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
                title: "Anda yakin untuk menghapus biaya \"" + name + "\"?",
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
        var jumlah = $(this).data("jumlah");
        var href = $(this).attr('href');
        $('#txtedNamaBiaya').val(nama);
        $('#txtedJumlah').val(jumlah);
        $('#updateForm').attr('action', href);
        $("#editBiaya").modal('show');
    });
</script>

@endpush