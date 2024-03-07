@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">User Management</h1>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Management</li>
                                    </ol>
                                </nav>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                                <li>
                                    <a href="/admin/userList" class="btn btn-primary btn-md d-md-none">
                                        <em class="icon ni ni-eye"></em>
                                        <span>View</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/userList" class="btn btn-primary d-none d-md-inline-flex">
                                        <em class="icon ni ni-eye"></em>
                                        <span>View User</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-block-head-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <form action="{{ route("userEditStore") }}" method="POST">
                        @csrf
                        <div class="row g-gs">
                            <div class="col-xxl-12">
                                <div class="gap gy-4">
                                    <div class="gap-col">
                                        <div class="card card-gutter-md">
                                            <div class="card-body">

                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <div class="row g-gs">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" placeholder="User Name" name="name" value="{{ $user->name }}">
                                                            </div>
                                                        </div><!-- .form-group -->
                                                        <div class="form-group">
                                                            <label class="form-label">Email</label>
                                                            <div class="form-control-wrap">
                                                                <input type="email" class="form-control" placeholder="User email" name="email"value="{{ $user->email }}" @readonly(true)>
                                                            </div>
                                                        </div><!-- .form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="form-control-wrap">
                                                                <div class="form-control-icon end">
                                                                    <em class="icon ni ni-eye" id="toggle-password"></em>
                                                                </div>
                                                                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" >
                                                            </div>
                                                            <label for="password" class="form-label">Confirm Password</label>
                                                            <div class="form-control-wrap">
                                                                <div class="form-control-icon end">
                                                                    <em class="icon ni ni-eye" id="toggle-password2"></em>
                                                                </div>
                                                                <input type="password" class="form-control" id="password_confirmation" placeholder="Enter password" name="password_confirmation" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Status</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="js-select" data-search="true" data-sort="false" name="status">
                                                                        @if ($user->role == "admin")
                                                                        <option value="admin" selected>Admin</option>
                                                                        <option value="user">User</option>
                                                                        @else
                                                                        <option value="user" selected>User</option>
                                                                        <option value="admin" >Admin</option>
                                                                        @endif
                                                            
                                                                    </select>
                                                                </div>
                                                            </div><!-- .form-group -->
                                                        </div>
                                                    </div><!-- .col -->
                                                </div>
                                            </div><!-- .card-body -->
                                        </div><!-- .card -->
                                    </div><!-- .gap-col -->
                                    <div class="gap-col">
                                        <ul class="d-flex align-items-center gap g-3">
                                            <li>
                                                <input type="hidden" name="id" value="{{$user->id}}" >
                                                <button type="submit" class="btn btn-primary">Update User</button>
                                            </li>
                                            <li>
                                                <a href="{{ url()->previous() }}" class="btn border-0">Cancel</a>
                                            </li>
                                        </ul>
                                    </div><!-- .gap-col -->
                                </div><!-- gap -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </form>
                </div><!-- nk-block -->
            </div><!-- .nk-content-body -->
        </div><!-- .content-inner -->
    </div><!-- .container-fluid -->
</div><!-- .nk-content -->







 @endsection         