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

                    <div class="card-body">
                        <table id="table-kk" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Job</th>
                                    <th>Company Name</th>
                                    <th>Job Title</th>
                                    <th>Requirement</th>
                                    <th>Salary</th>
                                    <th>Date Opened</th>
                                    <th>Date Expired</th>
                                    <th>Apply</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jbs as $pj )
                                    <tr>
                                        <td>{{ $pj->idJob }}</td>
                                        <td>{{ $pj->companyName }}</td>
                                        <td>{{ $pj->jobtitle }}</td>
                                        <td>{{ $pj->requirements }}</td>
                                        <td>{{ $pj->salary }}</td>
                                        <td>{{ $pj->dateopened }}</td>
                                        <td>{{ $pj->dateexpired }}</td>
                                        <td>
                                            <form action="{{ route('apply-job') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="idJob" value="{{ $pj->idJob }}">
                                                <input type="hidden" name="idUser" value="{{ auth()->id() }}">
                                                
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="birthDate">Birth Date</label>
                                                    <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="noHp">Phone Number</label>
                                                    <input type="text" class="form-control" id="noHp" name="noHp" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="cv">CV (PDF)</label>
                                                    <input type="file" class="form-control-file" id="cv" name="cv" accept=".pdf" required>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Apply</button>
                                            </form>
                                        </td>
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
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
