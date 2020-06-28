@extends('templates.default')
@push('style')

@endpush

@section('content')

<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Data Inventaris Barang</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    <li class="breadcrumb-item active" aria-current="page">Inventaris Barang</li>
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
                        <div class="col-md-12" style="text-align:right">
                            <form action="">
                                Lokasi :
                                <select name="" id="" style="margin-right:20px">
                                    <option value="">Semua</option>
                                    @foreach($lokasi as $row)
                                    <option value="{{ $row->id_lokasi }}">{{ $row->lokasi }}</option>
                                    @endforeach
                                </select>
                                Jenis Barang :
                                <select name="" id="" style="margin-right:20px">
                                    <option value="">Semua</option>
                                    @foreach($jenis as $row)
                                    <option value="{{ $row->id_jenis_barang }}">{{ $row->jenis_barang }}</option>
                                    @endforeach
                                </select>
                                Sumber Barang :
                                <select name="" id="">
                                    <option value="">Semua</option>
                                    @foreach($sumber as $row)
                                    <option value="{{ $row->id_sumber_barang }}">{{ $row->sumber_barang }}</option>
                                    @endforeach
                                </select>
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
                    <h4 class="card-title" style="display:inline-block;">Data barang</h4>
                    <a href="{{ route('barang.create') }}" class="btn btn-info float-right mb-3">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>
                    <a href="{{ route('barang.create') }}" class="btn btn-danger float-right mb-3" style="margin-right:15px">
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
                                    <th>Lokasi</th>
                                    <th>Jenis Barang</th>
                                    <th>Sumber Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kondisi</th>
                                    <th>Jumlah</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $number = 1;
                                ?>
                                @foreach($barang as $row)
                                <tr>
                                    <td>{{ $number }}</td>
                                    <td>{{ !empty($row->lokasi) ? $row->lokasi->lokasi:'' }}</td>
                                    <td>{{ !empty($row->jenisBarang) ? $row->jenisBarang->jenis_barang:'' }}</td>
                                    <td>{{ !empty($row->sumberBarang) ? $row->sumberBarang->sumber_barang:'' }}</td>
                                    <td>{{ $row->nama_barang }}</td>
                                    <td>{{ $row->kondisi }}</td>
                                    <td>{{ $row->jumlah_barang }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-light  btn-sm" id="detail" data-nama="{{ $row->nama_barang }}" data-deskripsi="{{ $row->keterangan }}" data-gambar="{{ asset('dokumen/inventaris/barang/'.$row->foto_barang) }}">
                                            <i class="fa fa-eye"> </i>
                                        </button>
                                        <a href="{{ route('barang.edit',  $row->id_barang) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"> </i>
                                        </a>
                                        <button href="{{ route('barang.destroy', $row->id_barang) }}" class="btn btn-danger  btn-sm" id="delete" data-nama="{{ $row->nama_barang }}">
                                            <i class="fa fa-trash"> </i>
                                        </button>
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

<form action="" method="post" id="deleteForm">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>

@include('admin.inventaris.barang.detail')


@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('templates.partials._sweetalert')
<script>
    $('button#delete').on('click', function() {
        var href = $(this).attr('href');
        var name = $(this).data('nama');
        Swal.fire({
                title: "Anda yakin untuk menghapus barang \"" + name + "\"?",
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

    $('button#detail').on('click', function() {
        var deskripsi = $(this).data("deskripsi");
        var gambar = $(this).data("gambar");
        var nama = $(this).data("nama");

        $('#detail_nama').html(nama);
        $('#detail_deskripsi').html(deskripsi);
        $('#detail_gambar').attr("src", gambar);
        $("#detailBarangModal").modal('show');


    });
</script>

@endpush