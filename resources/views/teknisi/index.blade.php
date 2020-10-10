@extends('layouts.default')

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Data Pengaduan</h4>
                        <form action="{{route('searchPengaduanTeknisi')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-4">
                                    <input type="text" name="dataPengaduan" class="form form-control pull-right" placeholder="Cari data">
                                </div>
                                <div class="form-group col-2">
                                    <button type="submit" class="btn btn-info">Cari</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table stylish-table">
                                <thead>
                                    <tr>
                                        <th>ID Pengaduan</th>
                                        <th>Nama Pengaduan</th>
                                        <th>Nama Client</th>
                                        <th>Tanggal</th>
                                        <th>File Foto</th>
                                        <th>File Foto 2</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengaduan as $item)
                                    <tr>
                                        <td>{{$item->id_maintenance}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->tanggal_pengajuan}}</td>
                                        <td>
                                            <a target="_blank" href="{{url('storage/'.$item->file1)}}" class=""><i class="fa fa-file-image-o"></i></a>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{url('storage/'.$item->file2)}}" class=""><i class="fa fa-file-image-o"></i></a>
                                        </td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            @if ($item->status == 'APPROVE')
                                                <a href="{{route('acceptPengaduanTeknisi', [$item->id])}}" class="btn btn-info" onclick="return confirm('Ingin mengerjakan task ini ?')">Accept</a>
                                            @elseif($item->status == 'ON PROGRESS')
                                                <a href="{{route('showPengaduan', [$item->id])}}" class="btn btn-info">Detail</a>
                                            @elseif($item->status == 'DONE')
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$pengaduan->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
@endsection