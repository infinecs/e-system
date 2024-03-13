@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Add Department</h2>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Job Department</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Department</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="nk-block">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('departmentStore') }}" method="POST" enctype="multipart/form-data" id="DepartmentForm">
                        @csrf
                            <div class="row g-gs">
                                <div class="col-md-8">
                                    <div class="card card-bordered">
                                        <div class="card-body">
                                            <div class="row g-gs">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> Department Name</label>
                                                        <input type="text" class="form-control" placeholder="Department Name" name="name" style="width: 150%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                <label class="form-label">Status</label>
                                                <select class="form-control" name="status" id="status" >
                                                    <option value="1" style="background-color: green;color: white;">Active</option>
                                                    <option value="0" style="background-color: red; color: white;">Deactive</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                <br>
<div class="row g-gs justify-content-end">
    <div class="gap-col">
        <ul class="d-flex align-items-center gap g-3">
            <li>
                <button type="submit" class="btn btn-primary">Add Department</button>
            </li>
            <li>
                <a href="admin/department" class="btn border-0">Cancel</a>
            </li>
        </ul>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection