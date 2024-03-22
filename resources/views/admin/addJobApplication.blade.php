@extends('layout.appAdmin')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Add Job Application</h2>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Job Application</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Job Application</li>
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
                        <form action="{{ route('applicationStore') }}" method="POST" enctype="multipart/form-data" id="jobApplicationForm">


                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-8">
                                    <div class="card card-bordered">
                                        <div class="card-body">
                                            <div class="row g-gs">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> First Name</label>
                                                        <input type="text" class="form-control" placeholder="First Name" name="FirstName" value="{{ old('FirstName') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" placeholder="Last Name" name="LastName" value="{{ old('LastName') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" placeholder="User email" name="Email" value="{{ old('Email') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Contact No</label>
                                                        <input type="text" class="form-control" placeholder="011-12345698" name="ContactNo" value="{{ old('ContactNo') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Position Applied</label>
                                                        <select class="form-control" name="PositionApplied">
                                                            <option value="">Select Position</option>
                                                            @foreach($positions as $id => $positionName)
                                                                <option value="{{ $id }}" {{ old('PositionApplied', $jobApplication->position_id) == $id ? 'selected' : '' }}>{{ $positionName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Job Type</label>
                                                        <select class="form-select" name="JobType">
                                                        <option value="" disabled selected>Select Job Type</option>
                                                            <option value="Experienced" {{ old('JobType') == 'Experienced' ? 'selected' : '' }}>Experienced</option>
                                                            <option value="FreshGraduate" {{ old('JobType') == 'FreshGraduate' ? 'selected' : '' }}>FreshGraduate</option>
                                                            <option value="Internship" {{ old('JobType') == 'Internship' ? 'selected' : '' }}>Internship</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Nationality</label>
                                                        <input type="text" class="form-control" placeholder="Country" name="Nationality" value="{{ old('Nationality') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Date Applied</label>
                                                        <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="DateCreate" value="{{ old('DateCreate') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Field of Study</label>
                                                            <input type="text" class="form-control" placeholder="Field of Study" name="FieldOfStudy" value="{{ old('FieldOfStudy') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">University/Institute</label>
                                                            <input type="text" class="form-control" placeholder="University/Institute" name="UniversityInstitute" value="{{ old('UniversityInstitute') }}">
                                                        </div>
                                                    </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Qualifications</label>
                                                        <input type="text" class="form-control" placeholder="Qualification" name="Qualification" value="{{ old('Qualification') }}">
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
    <label class="form-label">Applicant's Resume</label>
    <div class="form-control-wrap">
        <div class="js-upload d-flex justify-content-center align-items-center" id="UploadResume" data-max-files="1">
            <div class="dz-message" data-dz-message>
                <div class="dz-message-icon"></div>
                <span class="dz-message-text">Drag and drop file</span>
                <div class="dz-message-btn mt-2">
                    <input type="file" style="visibility: hidden; position: absolute;" name="UploadResume">
                    <button type="button" class="btn btn-primary mt-2" id="uploadButton">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="form-note mt-3" >Please add your resume. Only PDF files are accepted.</div>
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
                <button type="submit" class="btn btn-primary">Add Job Application</button>
            </li>
            <li>
                <a href="/admin/jobApplication" class="btn border-0">Cancel</a>
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
</div>



@endsection


