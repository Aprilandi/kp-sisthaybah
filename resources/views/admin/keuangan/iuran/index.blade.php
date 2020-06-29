@extends('templates.default')
@push('style')

@endpush

@section('content')

<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Data Iuran Santri</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    <li class="breadcrumb-item active" aria-current="page">Iuran</li>
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
                            <form action="{{ route('iuran.index') }}" method="get">
                                {{ csrf_field() }}
                                Santri :
                                <select name="santri" id="santri" style="margin-right:20px">
                                    <option value="">Semua</option>
                                    @foreach($santri as $row)
                                    <option
                                    @if(request()->santri == $row->id_santri)
                                    selected="selected"
                                    @endif
                                    value="{{ $row->id_santri }}">{{ $row->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                Biaya :
                                <select name="biaya" id="biaya" style="margin-right:20px">
                                    <option value="" selected>Semua</option>
                                    @foreach($biaya as $row)
                                    <option
                                    @if(request()->biaya == $row->id_biaya)
                                    selected="selected"
                                    @endif
                                    value="{{ $row->id_biaya }}">{{ $row->nama_biaya }}</option>
                                    @endforeach
                                </select>
                                Tanggal :
                                <input type="date">
                                -
                                <input type="date">
                                <button type="submit" class="btn btn-success btn-sm" style="margin-left:10px"> <i class="fa fa-search"></i> Filter</button>
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
                    <a href="{{ route('iuran.create') }}" class="btn btn-info float-right mb-3">
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
                                    <th>Nama Biaya</th>
                                    <th>Tanggal</th>
                                    <th>Nama Santri</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Telat</th>
                                    <th>Jumlah Hutang</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $number = 1;
                                ?>
                                @foreach($iuran as $row)
                                <tr>
                                    <td>{{ $number }}</td>
                                    <td>{{ $row->biaya->nama_biaya }}</td>
                                    <td>{{ $row->tahun_iuran.'-'.$row->tahun_bulan }}</td>
                                    <td>{{ $row->santri->nama_lengkap }}</td>
                                    <td>{{ number_format($row->jumlah_bayar, 2, ",", ".") }}</td>
                                    <td>@if($row->is_telat == 0) Tidak @elseif ($row->is_telat == 1) Iya @endif</td>
                                    <td>{{ number_format($row->jumlah_hutang, 2, ",", ".") }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('iuran.edit',  $row->id_iuran) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"> </i>
                                        </a>
                                        <button href="{{ route('iuran.destroy', $row->id_iuran) }}" class="btn btn-danger  btn-sm" id="delete" data-nama="{{ $row->santri->nama_lengkap }}" data-biaya="{{ $row->biaya->nama_biaya }}">
                                            <i class="fa fa-trash"> </i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                $number++
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


@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('templates.partials._sweetalert')
<script>
    $('button#delete').on('click', function() {
        var href = $(this).attr('href');
        var nama = $(this).data('nama');
        var biaya = $(this).data('biaya');
        Swal.fire({
                title: "Anda yakin untuk menghapus biaya \"" + biaya + "\" dari \"" + nama + "\"?",
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
</script>

@endpush