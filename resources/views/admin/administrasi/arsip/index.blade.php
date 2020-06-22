@extends('templates.default')
@push('style')
 {{-- aditional style --}}
@endpush

@section('content')

    <div class="page-breadcrumb border-bottom">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Master Arsip</h5>
                
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Data Arsip</li>
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
                                <h4 class="card-title">Data Arsip</h4>
                                <a href="{{ route('arsip.create') }}"><button class="btn btn-primary">Tambah Arsip</button></a>
                                {{-- <h6 class="card-subtitle">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code> $().DataTable();</code>. You can refer full documentation from here <a href="https://datatables.net/">Datatables</a></h6> --}}
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped border">
                                        <thead>
                                            <tr>
                                                <th>Nomor </th>
                                                <th>Nama Arsip</th>
                                                <th>Nomor Dokumen</th>
                                                <th>Tujuan Dokumen</th>
                                                <th>Asal Dokumen</th>
                                                <th>Tanggal Dokumen</th>
                                                <th>Disposisi Dokumen</th>
                                                <th>File Dokumen</th>
                                                <th>Is Disposisi Selesai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $nomor=1;
                                            ?>
                                            @foreach($arsip as $row)                                                    
                                                <tr>
                                                    <td>{{ $nomor++ }}</td>
                                                    <td>{{$row->nama_arsip}}</td>
                                                    <td>{{$row->nomor_dokumen}}</td>
                                                    <td>{{$row->tujuan_dokumen}}</td>
                                                    <td>{{$row->asal_dokumen}}</td>
                                                    <td>{{$row->tanggal_dokumen}}</td>
                                                    <td>
                                                    {{$row->disposisi_dokumen}}</td>
                                                    <td>{{$row->file_dokumen}}</td>
                                                    <td>{{$row->is_disposisi_selesai}}</td>
                                                    
                                                    
                                                    <td>
                                                    <a href="{{ route('arsip.edit', $row->id_arsip) }}"><button class="btn btn-primary">Edit</button></a>
                                                        
                                                        <a href="#"><button class="btn btn-danger">Hapus</button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

@endsection

@push('scripts')


 {{-- aditional JS --}}

@endpush