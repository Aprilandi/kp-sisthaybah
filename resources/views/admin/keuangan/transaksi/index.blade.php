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
            <div class="card" style="margin-bottom:5px">

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
                                    @foreach($kategori as $row)
                                        <option
                                        @if(request()->kategori == $row->id_kk)
                                        selected="selected"
                                        @endif
                                        value="{{ $row->id_kk }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                Jenis :
                                <select name="" id="" style="margin-right:20px">
                                    <option value="">Semua</option>
                                    <option
                                    @if(request()->jenis == 'Pemasukan')
                                    selected="selected"
                                    @endif
                                    value="Pemasukan">Pemasukan</option>
                                    <option
                                    @if(request()->jenis == 'Pengeluaran')
                                    selected="selected"
                                    @endif
                                    value="Pengeluaran">Pengeluaran</option>
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
                                <?php $number = 1; ?>
                                @foreach($transaksi as $row)
                                <tr>
                                    <td>{{ $number }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ $row->kategorikeuangan->nama_kategori }}</td>
                                    <td>{{ $row->kategoriKeuangan->jenis_kategori }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-light  btn-sm" id="detail" data-tanggal="{{ $row->tanggal }}" data-jenis="{{ $row->kategoriKeuangan->nama_kategori }}" data-keterangan="{{ $row->keterangan }}" data-gambar="{{ asset('dokumen/keuangan/transaksi/'.$row->gambar) }}">
                                            <i class="fa fa-eye"> </i>
                                        </button>
                                        <a href="{{ route('transaksi.edit',  $row->id_transaksi) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"> </i>
                                        </a>
                                        <button href="{{ route('transaksi.destroy', $row->id_transaksi) }}" class="btn btn-danger  btn-sm" id="delete" data-tanggal="{{ $row->tanggal }}" data-nama="{{ $row->kategoriKeuangan->nama_kategori }}">
                                            <i class="fa fa-trash"> </i>
                                        </button>
                                    </td>
                                </tr>
                                <?php $number++; ?>
                                @endforeach
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
    $('button#delete').on('click', function() {
        var href = $(this).attr('href');
        var nama = $(this).data('nama');
        var tanggal = $(this).data('tanggal');
        Swal.fire({
                title: "Anda yakin untuk menghapus transaksi \"" + nama + "\" pada tanggal \"" + tanggal + "\"?",
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
    $('button#detail').on('click', function() {
        var keterangan = $(this).data("keterangan");
        var gambar = $(this).data("gambar");
        var tanggal = $(this).data("tanggal");
        var jenis = $(this).data("jenis");


        $('#detail_tanggal').html(tanggal);
        $('#detail_kategori').html(jenis);
        $('#detail_keterangan').html(keterangan);
        $('#detail_gambar').attr("src", gambar);
        $("#detailTransaksiModal").modal('show');


    });
</script>

@endpush