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
                <h3 class="text-themecolor m-b-0 m-t-0">Edit Client</h3>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Client</li>
                </ol>
            </div>
        </div>
            <div class="card">
                <div class="card-block">
                <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data" action="{{route('updateClient', [$client->id])}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" name="name" value="{{$client->name}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control form-control-line" name="email" value="{{$client->email}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line" name="alamat" id="" cols="30" rows="10" required>{{$client->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Telpon</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line" name="telepon" value="{{$client->no_telp}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Seluler (HP)</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line" name="seluler" value="{{$client->no_hp}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{route('dataClient')}}" class="btn btn-warning">Cancel</a>
                                <button class="btn btn-success" >Save Data</button>
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