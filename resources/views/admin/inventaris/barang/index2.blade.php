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
                    <li class="breadcrumb-item active" aria-current="page">Inventaris Barang</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="card-title">Data Barang </h4>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" id='tambah' href="{{ route('barang.create') }}">
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
                                            <th>Nama Barang</th>
                                            <th>Foto Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Lokasi</th>
                                            <th>Sumber Barang</th>
                                            <th>Kondisi</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        ?>
                                        @foreach($barang as $row)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $row->nama_barang }}</td>
                                            <td><img src="{{ asset('dokumen/inventaris/barang/'.$row->foto_barang  ) }}" alt="" height="200px" ></td>
                                            <td>{{ !empty($row->jenisBarang) ? $row->jenisBarang->jenis_barang:'' }}</td>
                                            <td>{{ !empty($row->lokasi) ? $row->lokasi->lokasi:'' }}</td>
                                            <td>{{ !empty($row->sumberBarang) ? $row->sumberBarang->sumber_barang:'' }}</td>
                                            <td>{{ $row->kondisi }}</td>
                                            <td>{{ $row->jumlah_barang }}</td>
                                            <td>{{ $row->keterangan }}</td>
                                            <td>
                                                <button class="btn btn-primary" id="edit" href="{{ route('barang.edit', $row->id_barang) }}">Edit</button>
                                                <button class="btn btn-danger" id="delete" href="{{ route('barang.destroy', $row->id_barang) }}" data-nama="{{ $row->nama_barang }}">Hapus</button>
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

    $('button#edit').on('click', function() {
        var href = $(this).attr('href');
        window.location.href = href;
    });

    $('button#tambah').on('click', function() {
        var href = $(this).attr('href');
        window.location.href = href;
    });
</script>

@endpush