@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title">User Management</h1>
                        <nav>
                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Management</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="d-flex">
                            <li>
                                <a href="/admin/userAdd" class="btn btn-primary btn-md d-md-none">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/userAdd" class="btn btn-primary d-none d-md-inline-flex">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add User</span>
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
                                        <th><span class="overline-title">ID</span></th>
                                        <th><span class="overline-title">Name</span></th>
                                        <th><span class="overline-title">Email</span></th>
                                        <th><span class="overline-title">Email Verified At</span></th>
                                        <th><span class="overline-title">Role</span></th>
                                        <th><span class="overline-title">Created At</span></th>
                                        <th><span class="overline-title">Updated At</span></th>
                                        <th><span>Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userData as $key => $Data)
                                        
                                        <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$Data->id}}</td>
                                        <td>{{$Data->name}}</td>
                                        <td>{{$Data->email}}</td>
                                        <td>{{$Data->email_verified_at}}</td>
                                        <td>
                                            @if($Data->role =="admin")
                                                <span class="badge text-bg-success-soft">Admin</span>
                                            @else
                                                <span class="badge text-bg-primary-soft">User</span>
                                            
                                            @endif
                                        </td>
                                        <td>{{$Data->created_at}}</td>
                                        <td>{{$Data->updated_at}}</td>
                                        <td>
                                            <div class="dropdown d-flex justify-content-center  ">
                                                <a href="#" class="btn btn-sm btn-icon btn-zoom" data-bs-toggle="dropdown">
                                                    <em class="icon ni ni-more-v"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm  dropdown-menu-end">
                                                    <div class="dropdown-content py-1">
                                                        <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                            <li>
                                                                <a href="/admin/userEdit/{{$Data->id}}"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="/admin/userDelete/{{$Data->id}}" onclick="return showDeleteConfirmation(event, this)">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Delete</span>
                                                                </a>
                                                              </li>
                                                            
                                                            <li>
                                                                <a href="/admin/profile/{{$Data->id}}"><em class="icon ni ni-eye"></em><span>View Details</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- dropdown -->

                                        </td>
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