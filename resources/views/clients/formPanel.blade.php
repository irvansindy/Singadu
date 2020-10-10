@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Create Request Panel</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
                    <li class="breadcrumb-item active">Create Request Panel</li>
                </ol>
            </div>
        </div>
            <div class="card">
                <div class="card-block">
                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data" action="{{route('insertPanel')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-12">Select Type Maintenance</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="type">
                                    @foreach ($typeMaintenances as $item)
                                <option value="{{$item->id_type}}">{{$item->name_type}}</option>   
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Name of Panel</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="name">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line" name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                            @error('description')
                                <div class="invalid-feedback text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">File or Photo</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control form-control-line" name="file1">
                            </div>
                            @error('file1')
                                <div class="invalid-feedback text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{route('client')}}" class="btn btn-warning">Cancel</a>
                                <button class="btn btn-success" onclick="return confirm('Simpan data tersebut')">Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection