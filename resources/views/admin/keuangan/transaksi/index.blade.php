@extends('templates.default')
@push('style')

@endpush

@section('content')

<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Data Transaksi</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card"  style="margin-bottom:5px">

                <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h4>Saldo : Rp. 274.000.000</h4>
                    </div>
                    <div class="col-md-9" style="text-align:right">
                        <form action=""> 
                            Kategori :
                            <select name="" id="" style="margin-right:20px">
                                <option value="">Semua</option>
                                <option value="">Pemasukan</option>
                                <option value="">Pengeluaran</option>
                            </select>
                            Tanggal :
                            <input type="date">
                            -
                            <input type="date">
                            <button class="btn btn-success btn-sm" style="margin-left:10px"> <i class="fa fa-search"></i> Filter</button>
                        </form> 
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <h4 class="card-title" style="display:inline-block;">Data Transaksi</h4>
                    <a href="{{ route('transaksi.create') }}" class="btn btn-info float-right mb-3">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>
                    <a href="{{ route('transaksi.create') }}" class="btn btn-danger float-right mb-3" style="margin-right:15px">
                        <i class="fa fas fa-file-pdf"></i>
                        Cetak PDF
                    </a>

                    
                    <div class="clearfix"></div>
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Kategori Keuangan</th>
                                    <th>Jenis</th>
                                    <th>Jumlah (Rp)</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            <tr>
                                    <td>1</td>
                                    <td>27 Juni 2020</td>
                                    <td>Beli Peralatan</td>
                                    <td>Pengeluaran</td>
                                    <td>340.000</td>
                                    <td class="text-center">
                                        @php $idnya_data_transaksi = 1; @endphp

                                        <button class="btn btn-light  btn-sm" id="detail"
                                            data-keterangan="Data Keterangan"
                                            data-gambar="{{ asset('dokumen/keuangan/transaksi/bukti-1.png') }}">
                                            <i class="fa fa-eye"> </i>
                                        </button>
                                        <a href="{{ route('transaksi.edit',  $idnya_data_transaksi) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"> </i>
                                        </a>
                                        <button href="{{ route('transaksi.destroy', $idnya_data_transaksi) }}"
                                            class="btn btn-danger  btn-sm" id="delete"
                                            data-title="{{ 'row->nama_kamar' }}">
                                            <i class="fa fa-trash"> </i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>27 Juni 2020</td>
                                    <td>Donasi Wali Santri</td>
                                    <td>Pemasukan</td>
                                    <td>2.000.000</td>
                                    <td class="text-center">
                                        @php $idnya_data_transaksi = 2; @endphp

                                        <button class="btn btn-light  btn-sm" id="detail"
                                            data-keterangan="Data Keterangan"
                                            data-gambar="{{ asset('dokumen/keuangan/transaksi/bukti-2.png') }}">
                                            <i class="fa fa-eye"> </i>
                                        </button>
                                        <a href="{{ route('transaksi.edit',  $idnya_data_transaksi) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"> </i>
                                        </a>
                                        <button href="{{ route('transaksi.destroy', $idnya_data_transaksi) }}"
                                            class="btn btn-danger  btn-sm" id="delete"
                                            data-title="{{ 'row->nama_kamar' }}">
                                            <i class="fa fa-trash"> </i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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

@include('admin.keuangan.transaksi.detail')


@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('templates.partials._sweetalert')
<script>
    $('button#delete').on('click', function () {
        var href = $(this).attr('href');
        var name = $(this).data('title');
        Swal.fire({
                title: "Anda yakin untuk menghapus transaksi \"" + name + "\"?",
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

    $('button#edit').on('click', function () {
        var href = $(this).attr('href');
        var no = $(this).data("no");
        var nama = $(this).data("nama");
        var kapasitas = $(this).data("kapasitas")

        $('#no_kamar').val(no);
        $('#nama_kamar').val(nama);
        $('#kapasitas_kamar').val(kapasitas);
        $('#updateForm').attr('action', href);
        $("#editModal").modal('show');


    });
    $('button#detail').on('click', function () {
        var keterangan = $(this).data("keterangan");
        var gambar = $(this).data("gambar");


        $('#detail_keterangan').html(keterangan);
        $('#detail_gambar').attr("src", gambar);
        $("#detailTransaksiModal").modal('show');


    });

</script>

@endpush
