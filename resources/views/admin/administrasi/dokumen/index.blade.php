@extends('templates.default')
@push('style')
 {{-- aditional style --}}
@endpush

@section('content')

    <div class="page-breadcrumb border-bottom">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Master Dokumen</h5>
                
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Data Dokumen</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
   
    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            
                                            <h4 class="modal-title">Tambah Dokumen</h4> 
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nama Dokumen:</label>
                                                    <input type="text" class="form-control" id="recipient-name"> </div>
                                                    <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Keterangan:</label>
                                                    <input type="text" class="form-control" id="recipient-name"> </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Upload Template Dokumen:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

    <div class="page-content container-fluid">
            <div class="row">
                    <div class="col-12">
                        <div class="material-card card">
                            <div class="card-body">
                                <h4 class="card-title">Data Dokumen</h4>
                                <a><button class="btn btn-primary" data-toggle="modal" data-target="#responsive-modal">Tambah Dokumen</button><a>
                                {{-- <h6 class="card-subtitle">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code> $().DataTable();</code>. You can refer full documentation from here <a href="https://datatables.net/">Datatables</a></h6> --}}
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped border">
                                        <thead>
                                            <tr>
                                                <th>Nomor </th>
                                                <th>Nama Dokumen</th>
                                                
                                                <th>Keterangan</th>
                                                <th>Template Dokumen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $nomor=1;
                                            ?>
                                            @foreach($dokumen as $row)                                                    
                                                <tr>
                                                    <td>{{ $nomor++ }}</td>
                                                    <td>{{$row->nama_dokumen}}</td>
                                                    
                                                    <td>{{$row->keterangan}}</td>
                                                    <td><a href=""><button class="btn btn-primary">Download</button></a></td>
                                                    
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#responsive-modal">Edit</button>
                                                        
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