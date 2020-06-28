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
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
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
                    <h4 class="mb-0 text-white float-left">Form Tambah Transaksi</h4>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-light btn-sm float-right"> <i class=" fas fa-arrow-left"> </i> Kembali</a>
                </div>  
                <form class="form-horizontal r-separator" action="" method="">
                    <div class="card-body"> 
                        <div class="form-group row align-items-center mb-0">
                            <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kategori Keuangan</label>
                            <div class="col-9 border-left pb-2 pt-2">
                              <select name="id_kategori_keuangan" id="" class="form-control" required>
                                    <option value="">Pilih Kategori Keuangan</option>
                                    @foreach($kategori_keuangan as $kategori)
                                    <option value="{{ $kategori->id_kk }}">{{ $kategori->jenis_kategori }} - {{ $kategori->nama_kategori }}</option>
                                    @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Tanggal</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="date" class="form-control" id="inputEmail3" placeholder="Last Name Here">
                            </div>
                        </div>
                        <h3>Lanjutkan Sampai Semua Data</h3>
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
