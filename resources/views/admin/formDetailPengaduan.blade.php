@extends('layouts.default')

@section('content')
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-block">
            <form class="form-horizontal form-material" method="post" enctype="multipart/form-data" action="{{route('updatePengaduanAdmin', [$detailPengaduan->id])}}">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-12">Type Maintenance</label>
                        <div class="col-sm-12">
                            {{-- <select class="form-control form-control-line" name="type"> --}}
                            <input type="text" class="form-control form-control-line" name="type" value="{{$detailPengaduan->id_type}}" readonly>
                            {{-- </select> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Name of Panel</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" name="panel" value="{{$detailPengaduan->title}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Description</label>
                        <div class="col-md-12">
                            <textarea class="form-control form-control-line" name="description" id="" cols="30" rows="10" readonly>{{$detailPengaduan->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">File or Photo</label>
                        <div class="col-md-12">
                            <img src="{{url('storage/'.$detailPengaduan->file1)}}" alt="" width="300px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Pilih Teknisi</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line" name="teknisi">
                                @foreach ($teknisi as $itemTeknisi)
                                <option value="{{$itemTeknisi->id}}">{{$itemTeknisi->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <a href="{{route('admin')}}" class="btn btn-warning">Cancel</a>
                            <button class="btn btn-success">Approve</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
            
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection