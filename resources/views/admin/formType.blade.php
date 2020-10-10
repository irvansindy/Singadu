@extends('layouts.default')

@section('content')
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles my-4">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Create New Type</h3>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create New Type</li>
                </ol>
            </div>
        </div>
            <div class="card my-4">
                <div class="card-block">
                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data" action="{{route('insertType')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="name_type">
                            </div>
                            @error('name_type')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{route('admin')}}" class="btn btn-warning">Cancel</a>
                                <button class="btn btn-success" onclick="return confirm('Simpan data tersebut')">Save Data</button>
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