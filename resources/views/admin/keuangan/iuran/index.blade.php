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
                            <form action="">
                                Santri :
                                <select name="" id="" style="margin-right:20px">
                                    <option value="">Semua</option>
                                    @foreach($santri as $row)
                                    <option value="{{ $row->id_santri }}">{{ $row->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                Biaya :
                                <select name="" id="" style="margin-right:20px">
                                    <option value="semua" selected>Semua</option>
                                    @foreach($biaya as $row)
                                    <option value="{{ $row->id_biaya }}">{{ $row->nama_biaya }}</option>
                                    @endforeach
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
                                    <th>Data Transaksi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Data yang ditampilkan : nama biaya, tanggal, nama santri, jumlah_bayar, telat (ya/tidak) , jumlah hutang</td>
                                    <td class="text-center">
                                        @php $idnya_data_iurang = 1; @endphp

                                        <a href="{{ route('iuran.edit',  $idnya_data_iurang) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"> </i>
                                        </a>
                                        <button href="{{ route('iuran.destroy', $idnya_data_iurang) }}" class="btn btn-danger  btn-sm" id="delete" data-title="{{ 'row->nama_kamar' }}">
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


@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('templates.partials._sweetalert')
<script>
    $('button#delete').on('click', function() {
        var href = $(this).attr('href');
        var name = $(this).data('title');
        Swal.fire({
                title: "Anda yakin untuk menghapus kamar \"" + name + "\"?",
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