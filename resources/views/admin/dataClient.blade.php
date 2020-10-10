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
                    <a href="{{route('formDataClient')}}" class="btn btn-info custom pull-right">+ New Client</a>
                        <h4 class="card-title">Data Client</h4>
                        <div class="table-responsive m-t-40">
                            <table class="table stylish-table">
                                <thead>
                                    <tr>
                                        <th>ID Client</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach ($clients as $item)
                                        <td>{{$item->userid}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->no_telp}}</td>
                                        <td>
                                            <a href="{{route('editClient', [$item->id])}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('deleteClient', [$item->id])}}" class="btn btn-danger" onclick="return confirm('Hapus data {{$item->name}}')">Delete</a>
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