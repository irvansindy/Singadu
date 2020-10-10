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
                    <a href="{{route('formDataTeknisi')}}" class="btn btn-info custom pull-right">+ New Teknisi</a>
                        <h4 class="card-title">Data Teknisi</h4>
                        <div class="table-responsive m-t-40">
                            <table class="table stylish-table">
                                <thead>
                                    <tr>
                                        <th>ID Teknisi</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach ($teknisi as $item)
                                        <td>{{$item->userid}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->no_telp}}</td>
                                        <td>
                                            <a href="{{route('editTeknisi', [$item->id])}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('deleteTeknisi', [$item->id])}}" class="btn btn-danger" onclick="return confirm('Hapus data {{$item->name}}')">Delete</a>
                                        </td>
                                    @endforeach
                                    </tr>
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