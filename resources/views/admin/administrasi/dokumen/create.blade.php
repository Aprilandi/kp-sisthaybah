@extends('templates.default')
@push('style')
 {{-- aditional style --}}
@endpush

@section('content')

    <div class="page-breadcrumb border-bottom">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Master Jenis Dokumen</h5>
                
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Data Jenis Dokumen</li>
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
                                <h4 class="card-title">Tambah Jenis Dokumen</h4>
                                
                                {{-- <h6 class="card-subtitle">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code> $().DataTable();</code>. You can refer full documentation from here <a href="https://datatables.net/">Datatables</a></h6> --}}
                                
                                <form action="#" class="form-horizontal form-bordered">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Jenis Dokumen</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Jenis Dokumen" class="form-control">  </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Keterangan</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Keterangan" class="form-control">  </div>
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