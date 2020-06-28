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
                    <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Inventaris Barang</a></li>
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
                    <h4 class="mb-0 text-white float-left">
                        @if(isset($barang->id_barang))
                        Form Ubah Inventaris Barang
                        @else
                        Form Tambah Inventaris Barang
                        @endif
                    </h4>
                    <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm float-right"> <i class=" fas fa-arrow-left"> </i> Kembali</a>
                </div>
                <form class="form-horizontal r-separator" action=
                    @if(isset($barang->id_barang))
                    "{{ route('barang.update', [$barang->id_barang]) }}"
                    @else
                    "{{ route('barang.store') }}"
                    @endif
                method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(isset($barang->id_barang))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="card-body"> 
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtLokasi" class="col-3 text-right control-label col-form-label">Lokasi Barang</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select class="form-control" id="txtLokasi" name="txtLokasi" required>
                                    <option value="" selected disabled hidden>Pilih Lokasi</option>
                                    @foreach($lokasi as $lk)
                                    <option value="{{ $lk->id_lokasi }}" 
                                        @if(isset($barang->id_lokasi))
                                        @if ($lk->id_lokasi == $barang->id_lokasi))
                                        selected="selected"
                                        @endif
                                        @endif
                                        >{{ $lk->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtJenisBarang" class="col-3 text-right control-label col-form-label">Jenis Barang</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select class="form-control" id="txtJenisBarang" name="txtJenisBarang" required>
                                    <option value="" selected disabled hidden>Pilih Jenis Barang</option>
                                    @foreach($jenis as $jb)
                                    <option value="{{ $jb->id_jenis_barang }}" 
                                        @if(isset($barang->id_jenis_barang))
                                        @if ($jb->id_jenis_barang == $barang->id_jenis_barang))
                                        selected="selected"
                                        @endif
                                        @endif
                                        >{{ $jb->jenis_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtSumberBarang" class="col-3 text-right control-label col-form-label">Sumber Barang</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select class="form-control" id="txtSumberBarang" name="txtSumberBarang" required>
                                    <option value="" selected disabled hidden>Pilih Sumber Barang</option>
                                    @foreach($sumber as $sb)
                                    <option value="{{ $sb->id_sumber_barang }}" 
                                        @if(isset($barang->id_sumber_barang))
                                        @if ($sb->id_sumber_barang == $barang->id_sumber_barang))
                                        selected="selected"
                                        @endif
                                        @endif
                                        >{{ $sb->sumber_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtNamaBarang" class="col-3 text-right control-label col-form-label">Nama Barang</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="text" class="form-control" id="txtNamaBarang" name="txtNamaBarang" placeholder="Masukkan Nama Barang" value=
                                "{{ !empty($barang->nama_barang) ? $barang->nama_barang:'' }}"
                                required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtKondisi" class="col-3 text-right control-label col-form-label">Kondisi</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select class="form-control" id="txtKondisi" name="txtKondisi" required>
                                    <option value="" selected disabled hidden>Pilih Kondisi Barang</option>
                                    <option value="Baik" 
                                    @if(isset($barang->kondisi))
                                    @if($barang->kondisi == 'Baik')
                                    selected="selected"
                                    @endif
                                    @endif
                                    >Baik</option>
                                    <option value="Perbaikan"
                                    @if(isset($barang->kondisi))
                                    @if($barang->kondisi == 'Perbaikan')
                                    selected="selected"
                                    @endif
                                    @endif
                                    >Perbaikan</option>
                                    <option value="Rusak"
                                    @if(isset($barang->kondisi))
                                    @if($barang->kondisi == 'Rusak')
                                    selected="selected"
                                    @endif
                                    @endif
                                    >Rusak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtJumlah" class="col-3 text-right control-label col-form-label">Jumlah</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="number" class="form-control" id="txtJumlah" name="txtJumlah" placeholder="Masukkan Jumlah Barang" value=
                                "{{ !empty($barang->jumlah_barang) ? $barang->jumlah_barang:'' }}"
                                required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtKeterangan" class="col-3 text-right control-label col-form-label">Keterangan</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <textarea class="form-control" rows="4" cols="55" id="txtKeterangan" name="txtKeterangan" placeholder="Masukkan Keterangan">{{ !empty($barang->keterangan) ? $barang->keterangan:'' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtFotoBarang" class="col-3 text-right control-label col-form-label">Foto Barang</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="file" class="form-control-file" id="txtFotoBarang" name="txtFotoBarang" 
                                @if(isset($barang->foto_barang))
                                @else
                                required
                                @endif>
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
