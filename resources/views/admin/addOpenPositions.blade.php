@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Add Open Position</h2>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Open Positions</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Open Positions</li>
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
                        <form action="{{ route('PositionsStore') }}" method="POST" enctype="multipart/form-data" id="OpenPositionsForm">


                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-8">
                                    <div class="card card-bordered">
                                        <div class="card-body">
                                            <div class="row g-gs">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> Position Name</label>
                                                        <input type="text" class="form-control" placeholder="Position" name="position_name" style="width: 150%;">
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
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Job Discription</label>
                                                        <textarea type="text" class="form-control" placeholder="Discription" name="job_description"  style="height: 150px; width: 200%;" ></textarea>
                                                         
                                                    </div>
                                                </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-bordered">
                                        <div class="card-body">
                                            <div class="form-group">
                                            
                                            <div class="col-sm-6">
                                            <div class="form-group text-center">
    <label class="form-label">Job Discription PDF</label>
    <div class="form-control-wrap">
        <div class="js-upload d-flex justify-content-center align-items-center" id="pdf_file" data-max-files="1">
            <div class="dz-message" data-dz-message>
                <div class="dz-message-icon"></div>
                <span class="dz-message-text">Drag and drop file</span>
                <div class="dz-message-btn mt-2">
                    <input type="file" style="visibility: hidden; position: absolute;" name="pdf_file">
                    <button type="button" class="btn btn-primary mt-2" id="uploadButton">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="form-note mt-3" >Job Discription PDF. Only PDF files are accepted.</div>
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
                <button type="submit" class="btn btn-primary">Add Open Positions</button>
            </li>
            <li>
                <a href="admin/OpenPositions" class="btn border-0">Cancel</a>
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
