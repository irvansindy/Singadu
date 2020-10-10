@extends('layouts.default')

@section('content')
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-block">
            <form class="form-horizontal form-material" method="post" enctype="multipart/form-data" action="{{route('updatePengaduanTeknisi', [$detailPengaduan->id])}}">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12">Nama kerusakan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" name="panel" value="{{$detailPengaduan->title}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Deskripsi keluhan</label>
                        <div class="col-md-12">
                            <textarea class="form-control form-control-line" name="description" id="" cols="30" rows="10" readonly>{{$detailPengaduan->description}}</textarea>
                        </div>
                    {{-- </div>
                    <div class="form-group">
                        <label class="col-md-12">File Photo</label>
                        <div class="col-md-12">]
                            <a target="_blank" href="{{url('storage/'.$detailPengaduan->file1)}}" class=""><i class="fa fa-file-image-o"></i></a>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <div class="invalid-feedback text-block">* Diisi oleh teknisi</div>
                        <label class="col-md-12">File Photo</label>
                        <div class="col-md-12">
                            <input type="file" class="form-control form-control-line" name="file2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="invalid-feedback text-block">* Diisi oleh teknisi</div>
                        <label class="col-md-12">Deskripsi Penyelesaian</label>
                        <div class="col-md-12">
                            <textarea class="form-control form-control-line" name="description" id="" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <a href="{{route('teknisi')}}" class="btn btn-warning">Cancel</a>
                            <button class="btn btn-success" onclick="return confirm('Simpan data tersebut')">Done</button>
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