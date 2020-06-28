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
                    <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <button class="btn btn-primary" type="button" id="kembali" href="{{ route('barang.index') }}">Kembali</button>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <div class="row">
                        <form action=
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
                            <div class="form-group">
                                <label for="txtNamaBarang">Nama Barang</label>
                                <input type="text" class="form-control" id="txtNamaBarang" name="txtNamaBarang" placeholder="Masukkan Nama Barang" value=
                                "{{ !empty($barang->nama_barang) ? $barang->nama_barang:'' }}"
                                required>
                            </div>
                            <div class="form-group">
                                <label for="txtFotoBarang">Foto Barang</label><br>
                                <input type="file" class="form-control-file" id="txtFotoBarang" name="txtFotoBarang" 
                                @if(isset($barang->foto_barang))
                                @else
                                required
                                @endif>
                            </div>
                            <div class="form-group">
                                <label for="txtJenisBarang">Jenis Barang</label>
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
                            <div class="form-group">
                                <label for="txtLokasi">Lokasi</label>
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
                            <div class="form-group">
                                <label for="txtSumberBarang">Sumber Barang</label>
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
                            <div class="form-group">
                                <label for="txtKondisi">Kondisi</label>
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
                            <div class="form-group">
                                <label for="txtJumlah">Jumlah</label>
                                <input type="number" class="form-control" id="txtJumlah" name="txtJumlah" placeholder="Masukkan Jumlah Barang" value=
                                "{{ !empty($barang->jumlah_barang) ? $barang->jumlah_barang:'' }}"
                                required>
                            </div>
                            <div class="form-group">
                                <label for="txtKeterangan">Keterangan</label><br>
                                <textarea class="form-control" rows="4" cols="55" id="txtKeterangan" name="txtKeterangan" placeholder="Masukkan Keterangan">{{ !empty($barang->keterangan) ? $barang->keterangan:'' }}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" name="kembali" id="kembali" class="btn btn-secondary" href="{{ route('barang.index') }}">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

{{-- aditional JS --}}

<script>
    $('button#kembali').on('click', function() {
        var href = $(this).attr('href');
        window.location.href = href;
    });
</script>

@endpush