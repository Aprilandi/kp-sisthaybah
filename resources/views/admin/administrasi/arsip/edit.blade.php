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
                                <h4 class="card-title">Edit Arsip</h4>
                                
                                {{-- <h6 class="card-subtitle">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code> $().DataTable();</code>. You can refer full documentation from here <a href="https://datatables.net/">Datatables</a></h6> --}}
                                
                                <form action="#" class="form-horizontal form-bordered">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama Arsip</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Nama Arsip" class="form-control">  </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">No Dokumen</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="No Dokumen" class="form-control">  </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tujuan Dokumen</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Tujuan Dokumen" class="form-control">  </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Asal Dokumen</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Asal Dokumen" class="form-control">  </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tanggal Dokumen</label>
                                                <div class="col-md-9">
                                                    <input type="date" placeholder="Tanggal Dokumen" class="form-control">  </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Disposisi Dokumen</label>
                                                <div class="col-md-9">
                                                <textarea class="form-control" rows="5"></textarea>  </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">File Dokumen</label>
                                                <div class="col-md-9">
                                                    <input type="file" placeholder="File Dokumen" class="form-control">  </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Is Disposisi Selesai</label>
                                                <div class="radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="optionsRadios2" value="option1"> Selesai </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="optionsRadios2" value="option2" checked=""> Belum Selesai </label>
                                                            </div>
                                            </div>
                                            
                                            
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                                            <button type="button" class="btn btn-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

@endpush