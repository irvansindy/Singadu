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
                <h3 class="text-themecolor m-b-0 m-t-0">Create New User</h3>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create New User</li>
                </ol>
            </div>
        </div>
            <div class="card">
                <div class="card-block">
                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data" action="{{route('storeClient')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control form-control-line" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line" name="alamat" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Telpon</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line" name="telepon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Seluler (HP)</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line" name="seluler">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Select Role</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="role">
                                    <option hidden>Select Role</option>
                                    <option value="ADMIN">Admin</option>
                                    <option value="CLIENT">Client</option>
                                    <option value="TEKNISI">Teknisi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Save Data</button>
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