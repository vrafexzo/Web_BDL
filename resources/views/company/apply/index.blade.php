@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Job Posting</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Post Job</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="card-header">
                        <a href="{{ route('pj-create') }}" role="button" class="btn btn-success">Tambah Job</a>
                        {{-- <a href="{{ route('mk-index') }}" role="button" class="btn btn-success">Tambah Role</a> --}}
                    </div>
                    <div class="card-body">
                        <table id="table-kk" class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID Apply</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Birth Date</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>CV</th>
                                <th>Status</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($apl as $apply )
                        <tr>
                            <td>{{ $apply->idApply }}</td>
                            <td>{{ $apply->name }}</td>
                            <td>{{ $apply->address }}</td>
                            <td>{{ $apply->birthDate }}</td>
                            <td>{{ $apply->email }}</td>
                            <td>{{ $apply->noHp }}</td>
                            <td>{{ $apply->cv }}</td>
                            <td>{{ $apply->status }}</td>
                     
                           {{-- <td>
                                <a href="/" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a> 

                                <a href="{{ route('pj-edit', $pj->id) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('pj-delete', $pj->id) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
                            </td>--}}
                        </tr>
                        @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection