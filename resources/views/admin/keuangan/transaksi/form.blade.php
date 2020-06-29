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
                    <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if(isset($transaksi->id_transaksi))
                        Ubah data
                        @else
                        Tambah data
                        @endif
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h4 class="mb-0 text-white float-left">
                        @if(isset($transaksi->id_transaksi))
                        Form Ubah Transaksi
                        @else
                        Form Tambah Transaksi
                        @endif
                    </h4>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-light btn-sm float-right"> <i class=" fas fa-arrow-left"> </i> Kembali</a>
                </div>
                <form class="form-horizontal r-separator" action=
                    @if(isset($transaksi->id_transaksi))
                    {{ route('transaksi.update', [$transaksi->id_transaksi]) }}
                    @else
                    {{ route('transaksi.store') }}
                    @endif
                    method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(isset($transaksi->id_transaksi))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="card-body">
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtKategori" class="col-3 text-right control-label col-form-label">Kategori Keuangan</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select name="txtKategori" id="txtKategori" class="form-control" required>
                                    <option value="" selected hidden disabled>Pilih Kategori Keuangan</option>
                                    @foreach($kategori_keuangan as $kategori)
                                    <option
                                    @if(isset($transaksi->id_transaksi))
                                    @if($transaksi->id_kk == $kategori->id_kk)
                                    selected="selected"
                                    @endif
                                    @endif
                                    value="{{ $kategori->id_kk }}">{{ $kategori->jenis_kategori }} - {{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtTanggal" class="col-3 text-right control-label col-form-label">Tanggal</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="date" class="form-control" id="txtTanggal" name="txtTanggal" placeholder="Masukkan Tanggal Kegiatan" value=
                                @if(isset($transaksi->tanggal))
                                {{ $transaksi->tanggal }}
                                @else
                                {{ date('Y-m-d') }}
                                @endif
                                required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtJumlah" class="col-3 text-right control-label col-form-label">Jumlah</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="number" class="form-control" id="txtJumlah" name="txtJumlah" placeholder="Masukkan Jumlah" value="{{ !empty($transaksi->jumlah) ? $transaksi->jumlah:'' }}" required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtKeterangan" class="col-3 text-right control-label col-form-label">Keterangan</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <textarea class="form-control" rows="4" cols="55" id="txtKeterangan" name="txtKeterangan" placeholder="Masukkan Keterangan">{{ !empty($transaksi->keterangan) ? $transaksi->keterangan:'' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtGambar" class="col-3 text-right control-label col-form-label">Foto Barang</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="file" class="form-control-file" id="txtGambar" name="txtGambar" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-0 text-right">
                            <button type="reset" class="btn btn-dark waves-effect waves-light">Batal</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')


@endpush