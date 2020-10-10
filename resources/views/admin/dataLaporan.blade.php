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
                        {{-- <a href="{{route('formDataUser')}}" class="btn btn-info custom pull-right">+ New Teknisi</a> --}}
                        <a href="{{route('reportExcel')}}" class="btn btn-success my-3 custom pull-right" target="_blank">EXPORT EXCEL</a>
                        <h4 class="card-title">Riwayat Pengaduan</h4>
                        <div class="table-responsive m-t-40">
                            <table class="table stylish-table">
                                <thead>
                                    <tr>
                                        <th>ID Pengaduan</th>
                                        <th>Nama Pengaduan</th>
                                        <th>Nama Client</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $item)
                                    <tr>
                                        <td>{{$item->id_maintenance}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->tanggal_pengajuan}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <a href="" class="btn btn-info">Detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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