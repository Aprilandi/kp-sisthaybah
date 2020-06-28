@extends('templates.default')
@push('style')

@endpush

@section('content')


<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Data Iuran</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    <li class="breadcrumb-item"><a href="{{ route('iuran.index') }}">Iuran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if(isset($iuran->id_iuran))
                            Ubah Data
                        @else
                            Tambah Data
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
                        @if(isset($iuran->id_iuran))
                            Form Ubah Iuran Santri
                        @else
                            Form Tambah Iuran Santri
                        @endif
                    </h4>
                    <a href="{{ route('iuran.index') }}" class="btn btn-light btn-sm float-right"> <i class=" fas fa-arrow-left"> </i> Kembali</a>
                </div>
                <form class="form-horizontal r-separator" action=
                @if(isset($iuran->id_iuran))
                "{{ route('iuran.update', [$iuran->id_iuran]) }}"
                @else
                "{{ route('iuran.store') }}"
                @endif
                method="post">
                    {{ csrf_field() }}
                    @if(isset($iuran->id_iuran))
                        {{ method_field('PUT') }}
                    @endif
                    <div class="card-body">
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtJenisBiaya" class="col-3 text-right control-label col-form-label">Jenis Biaya</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select name="txtJenisBiaya" id="txtJenisBiaya" class="form-control" required>
                                    <option value="" selected hidden disabled>Pilih Jenis Biaya</option>
                                    @foreach($biaya as $row)
                                        <option value="{{ $row->id_biaya }}"
                                            @if(isset($iuran->id_iuran))
                                                @if($row->id_biaya == $iuran->id_biaya)
                                                    selected="selected"
                                                @endif
                                            @endif
                                        >{{ $row->nama_biaya }} - {{ $row->jumlah }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtNamaSantri" class="col-3 text-right control-label col-form-label">Nama Santri</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select name="txtNamaSantri" id="txtNamaSantri" class="form-control" required>
                                    <option value="" selected hidden disabled>Pilih Santri</option>
                                    @foreach($santri as $row)
                                        <option value="{{ $row->id_santri }}"
                                            @if(isset($iuran->id_iuran))
                                                @if($row->id_santri == $iuran->id_santri)
                                                    selected="selected"
                                                @endif
                                            @endif
                                        >{{ $row->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtTelat" class="col-3 text-right control-label col-form-label">Telat</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="radio" name="is_telat"
                                @if(isset($iuran->id_iuran))
                                    @if($iuran->is_telat == TRUE)
                                        checked
                                    @endif
                                @endif
                                value="ya"> Ya
                                <input type="radio" name="is_telat"
                                @if(isset($iuran->id_iuran))
                                    @if($iuran->is_telat == FALSE)
                                        checked
                                    @endif
                                @endif
                                value="tidak" style="margin-left:15px"> Tidak
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtTanggalIuran" class="col-3 text-right control-label col-form-label">Tahun Iuran</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="month" class="form-control" id="txtTanggalIuran" name="txtTanggalIuran" required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtJumlahBayar" class="col-3 text-right control-label col-form-label">Jumlah Bayar</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="number" class="form-control" id="txtJumlahBayar" name="txtJumlahBayar" value="{{ !empty($iuran->jumlah_bayar) ? $iuran->jumlah_bayar:'' }}" required>
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