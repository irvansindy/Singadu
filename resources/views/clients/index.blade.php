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
                    <a href="{{route('formPanel')}}" class="btn btn-info custom pull-right">+ New Pengaduan</a>
                        <h4 class="card-title">List Data Panel</h4>
                        <form action="{{route('searchPengaduanClient')}}" method="GET">
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
                                        <th>Tanggal</th>
                                        <th>File/Photo</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengaduan as $item)
                                    <tr>
                                        <td>{{$item->id_maintenance}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->tanggal_pengajuan}}</td>
                                        <td>
                                            <a target="_blank" href="{{url('storage/'.$item->file1)}}" class=""><i class="fa fa-file-image-o"></i></a>
                                        </td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            @if ($item->status == 'WAITING')
                                                <a href="{{route('deletePanel', [$item->id])}}" class="btn btn-danger">Cancel</a>
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
    </div>
        
@endsection