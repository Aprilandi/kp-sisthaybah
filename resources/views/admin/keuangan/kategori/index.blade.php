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
                    <li class="breadcrumb-item active" aria-current="page">Data Kategori Keuangan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <!-- Modal -->
    <div id="tambahKategoriKeuangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriKeuanganLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKategoriKeuanganLabel"><b>Tambah Data Kategori Keuangan</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kategori.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="txtNamaKategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="txtNamaKategori" name="txtNamaKategori" placeholder="Masukkan Nama Kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="txtJenisKategori">Jenis Kategori</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="txtJenisKategori" id="jns1" value="Pemasukan">
                                <label class="form-check-label" for="jns1">Pemasukan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="txtJenisKategori" id="jns2" value="Pengeluaran">
                                <label class="form-check-label" for="jns2">Pengeluaran</label>
                            </div>
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
    <div id="editKategoriKeuangan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editKategoriKeuanganLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKategoriKeuanganLabel"><b>Edit Data Kategori Keuangan</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="txtNamaKategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="txtedNamaKategori" name="txtedNamaKategori" placeholder="Masukkan Nama Kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="txtJenisKategori">Jenis Kategori</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="txtedJenisKategori" id="jns1" value="Pemasukan">
                                <label class="form-check-label" for="jns1">Pemasukan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="txtedJenisKategori" id="jns2" value="Pengeluaran">
                                <label class="form-check-label" for="jns2">Pengeluaran</label>
                            </div>
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
                            <h4 class="card-title">Data Kategori Keuangan </h4>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategoriKeuangan">
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
                                            <th>Nama Kategori</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        ?>
                                        @foreach($kategori_keuangan as $row)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->jenis_kategori }}</td>
                                            <td>
                                                <button class="btn btn-primary" id="edit" href="{{ route('kategori.update', $row->id_kk) }}" data-nama="{{ $row->nama_kategori }}" data-jenis="{{ $row->jenis_kategori }}">Edit</button>
                                                <button class="btn btn-danger" id="delete" href="{{ route('kategori.destroy', $row->id_kk) }}" data-nama="{{ $row->nama_kategori }}">Hapus</button>
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
                title: "Anda yakin untuk menghapus kategori \"" + name + "\"?",
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
        var jenis = $(this).data("jenis");
        var href = $(this).attr('href');
        $('#txtedNamaKategori').val(nama);
        if(jenis == "Pemasukan"){
            $('#updateForm').find(':radio[name=txtedJenisKategori][id=jns1]').prop('checked', true);
        }
        else if(jenis == "Pengeluaran"){
            $('#updateForm').find(':radio[name=txtedJenisKategori][id=jns2]').prop('checked', true);
        }
        $('#updateForm').attr('action', href);
        $("#editKategoriKeuangan").modal('show');
    });
</script>

@endpush