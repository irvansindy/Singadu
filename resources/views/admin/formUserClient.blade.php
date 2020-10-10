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
                <h3 class="text-themecolor m-b-0 m-t-0">Create New Client</h3>
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
                            <input type="text" class="form-control form-control-line @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="invalid-feedback text-danger">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control form-control-line @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                                @error('email')
                                    <div class="invalid-feedback text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line @error('alamat') is-invalid @enderror" name="alamat" id="" cols="30" rows="10">{{old('alamat')}}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Telpon</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line @error('telepon') is-invalid @enderror" name="telepon" value="{{old('telepon')}}">
                                @error('telepon')
                                    <div class="invalid-feedback text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Seluler (HP)</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line @error('seluler') is-invalid @enderror" name="seluler" value="{{old('seluler')}}">
                                @error('seluler')
                                    <div class="invalid-feedback text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line @error('password') is-invalid @enderror" name="password" id="password">
                                <input type="checkbox" id="show-password">
                                @error('password')
                                    <div class="invalid-feedback text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password Confirmation</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line @error('passwordConfirmation') is-invalid @enderror" name="passwordConfirmation" id="passwordConfirmation">
                                <input type="checkbox" id="show-passwordConfirmation">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{route('dataClient')}}" class="btn btn-warning">Cancel</a>
                                <button class="btn btn-success" onclick="return confirm('Simpan data tersebut')">Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script>
        $(document).ready(function(){  
            $('#show-password').click(function(){
                if($(this).is(':checked')){
                    $('#password').attr('type','text');
                }else{
                    $('#password').attr('type','password');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){  
            $('#show-passwordConfirmation').click(function(){
                if($(this).is(':checked')){
                    $('#passwordConfirmation').attr('type','text');
                }else{
                    $('#passwordConfirmation').attr('type','password');
                }
            });
        });
    </script>
@endsection