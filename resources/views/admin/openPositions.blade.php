@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title">Candidates</h1>
                        <div>
                            
                        <nav>
                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Candidates</li>
                            </ol>
                        </nav>
                    </div>
                    </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                                <li>
                                    <a href="admin/addOpenPositions" class="btn btn-primary btn-md d-md-none">
                                        <em class="icon ni ni-plus"></em>
                                        <span>Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/addOpenPositions" class="btn btn-primary d-none d-md-inline-flex">
                                        <em class="icon ni ni-plus"></em>
                                        <span>Add Job Positions</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nk-block"> 
                                <div class="card">
                                    <div class="card-body">
                                        @include('inc.message')
                                        
                                        <table class="datatable-init table small-font-datatable" data-nk-container="table-responsive table-border">
                                            <thead>
                                                <tr>
                                                    <th><span class="overline-title">No.</span></th>
                                                    <th><span class="overline-title">Position Name</span></th>
                                                    <th><span class="overline-title">Job Department</span></th>
                                                    <th><span class="overline-title">Job Location</span></th>
                                                    <th><span class="overline-title">Job Status</span></th>
                                                    <th><span class="overline-title">Create Date</span></th>
                                                    <th style="text-align: center;"><span class="overline-title">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
    @foreach($positions as $key => $position)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td><a style="font-weight:bold;" href="/admin/job/{{ $position->id }}">{{ $position->position_name }}</a></td>
        <td>{{ $position->department_name }}</td>
        <td>{{ $position->office_address }}</td>
        <td>
        @if($position->status == 1)
            <span class="badge text-bg-success-soft">Active</span>
        @else
            <span class="badge text-bg-danger-soft">Deactive</span> 
        @endif
    </td>
    <td>{{ $position->created_at }}</td>
        <td>
            <div class="dropdown d-flex justify-content-center">
                <a href="#" class="btn btn-sm btn-icon btn-zoom" data-bs-toggle="dropdown">
                    <em class="icon ni ni-more-v"></em>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                    <div class="dropdown-content py-1">
                        <ul class="link-list link-list-hover-bg-primary link-list-md">
                            <li>
                            <a href="/admin/editPositions/{{ $position->position_id }}"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                            </li>
                            <li>
                                <a href="/admin/PositionsDelete/{{ $position->position_id }}" onclick="return showDeleteConfirmation(event, this)">
                                    <em class="icon ni ni-trash"></em>
                                    <span>Delete</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('Job Discription PDF/' . $position->pdf_file) }}" target="_blank">
                                <em class="icon ni ni-file-pdf"></em>
                                <span>View Details PDF</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- dropdown -->
        </td>
        
</tr>
    </tr>
    @endforeach
</tbody>
                            </table>
                        </div><!-- .card-body -->
                    </div><!-- .card -->
            </div>
        </div>
        </div>
    </div>
</div> <!-- .nk-content -->
@endsection