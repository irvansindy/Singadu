@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Home</h3>
            </div>
        </div>
        <div class="card my-2">
            <h3 class="text my-2 mx-2">Data Pengaduan Client</h3>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Waiting</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0">{{$waiting}}</h2>
                            <span class="text-muted">Pengaduan</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Approve</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0">{{$approve}}</h2>
                            <span class="text-muted">Pengaduan</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">On Progress</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0">{{$onProgess}}</h2>
                            <span class="text-muted">Pengaduan</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Done</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0">{{$done}}</h2>
                            <span class="text-muted">Pengaduan</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <div class="card">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                        <h4 class="card-title">Data Pengaduan</h4>
                            <form action="{{route('searchPengaduanAdmin')}}">
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
                                <table class="table stylish-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>ID Pengaduan</th>
                                            <th>Nama Pengaduan</th>
                                            <th>Nama Client</th>
                                            <th>File Foto</th>
                                            <th>Tanggal</th>
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
                                            <td>
                                                <a target="_blank" href="{{url('storage/'.$item->file1)}}" class=""><i class="fa fa-file-image-o"></i></a>
                                            </td>
                                            <td>{{$item->tanggal_pengajuan}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                @if ($item->status == 'WAITING')
                                                    <a href="{{route('detailPengaduan', [$item->id])}}" class="btn btn-info">Detail</a>
                                                @else
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
        </div>
    </div>
@endsection
