@extends('adminlte::page')
@section('title', 'Team')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="active">Info Panel</li>
            </ul>
            <p>
                    <a href="{{ route('teams.create') }}" class="btn btn-primary modal-show">
                    <span class="glyphicon glyphicon-plus"aria-hidden="true"></span> Tambah <a>
                            <a class="btn btn-success" href="{{ url('/pdf/teams') }}">
                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print </a>
            </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Info Panel</h2>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Link Image</th>
                                        <th>Career ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @push('scripts')
        <script>
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.teams') }}",
                columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'image', name: 'image'},
                {data: 'jobs.career', name: 'jobs.career'},
                {data: 'action', name: 'action'}
                ]
            });
        </script>
        @endpush                                

