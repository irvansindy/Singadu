@extends('layouts.default')

@section('content')
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Create Request Panel</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create Request Panel</li>
                </ol>
            </div>
            {{-- <div class="col-md-6 col-4 align-self-center">
                <a href="https://wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down btn-success"> Upgrade to Pro</a>
            </div> --}}
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        {{-- <div class="row"> --}}
            <!-- Column -->
            {{-- <div class="col-lg-8 col-xlg-9 col-md-7"> --}}
            <div class="card">
                <div class="card-block">
                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data" action="{{route('insert')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-12">Select Type Maintenance</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="user">
                                    <option hidden>Type of Maintenance</option>
                                    <option value="01">Revisi</option>
                                    <option value="02">Repair</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Name of Panel</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="panel">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line" name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">File or Photo</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control form-control-line" name="fileDesign">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-sm-12">Select Type Maintenance</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="user">
                                            <option hidden>Type of Maintenance</option>
                                            <option value="01">Revisi</option>
                                            <option value="02">Repair</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success custom pull-right">Save Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- </div> --}}
            <!-- Column -->
        {{-- </div> --}}
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection