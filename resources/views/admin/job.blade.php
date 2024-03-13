@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h1 class="nk-block-title">Job</h1>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Job</li>
                                </ol>
                            </nav>
                        </div>
                        </div><div class="nk-content">
                    <div class="container">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-between flex-wrap gap g-2 align-items-start">
                                            <div class="nk-block-head-content">
                                                <div class="d-flex flex-column flex-md-row align-items-md-center">
                                                    <div class="media media-huge media-circle">
                                                        <img src="./images/avatar/a.jpg" class="img-thumbnail" alt="">
                                                    </div>
                                                    <div class="mt-3 mt-md-0 ms-md-3">
                                                        <h3 class="title mb-1">Software Developer</h3>
                                                        <span class="small">IT Department</span>
                                                        <ul class="nk-list-option pt-1">
                                                            <li><em class="icon ni ni-map-pin"></em><span class="small">PENANG , Malaysia</span></li>
                                                            <li><em class="icon ni ni-building"></em><span class="small">Infinecs Systems Sdn Bhd</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head-content -->
                                            <div class="nk-block-head-content">
                                                <div class="d-flex gap g-3">
                                                    <div class="gap-col">
                                                    
                                                    <h3 class="title mb-1"><em class="icon ni ni-spark-fill"></em> Status :</h3>
                                                    </div>
                                                    <div class="gap-col">
                                                    <span class="badge text-bg-success" style="font-size: 1.2rem;">Active</span>
                                                        
                                                    </div>
                                                    <div class="gap-col">
                                                    <button  style="font-size: 1.3rem; border: none; background-color: transparent;" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ni ni-more-v"></i> <!-- Three-dot button icon -->
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                                            <li><a class="dropdown-item" href="#">Add Candidate</a></li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head-content -->
                                        </div><!-- .nk-block-head-between -->
                                    </div><!-- .nk-block-head -->
                        <div class="nk-block-head-between gap g-2">
                            <div class="gap-col">
                                <ul class="nav nav-pills nav-pills-border gap g-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" aria-selected="true" role="tab"> Candidates </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" type="button "data-bs-toggle="tab" aria-selected="false" data-bs-target="#tab-2" tabindex="-1" role="tab"> Summary </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" type="button" data-bs-toggle="tab" aria-selected="false" data-bs-target="#tab-3" tabindex="-1" role="tab"> Notes </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" type="button" data-bs-toggle="tab" aria-selected="false" data-bs-target="#tab-4" tabindex="-1" role="tab"> Attachments </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="gap-col">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="nk-block">
                    <div class="tab-content" id="myTabCandidates">
                        <div class="tab-pane show active" id="tab-1" tabindex="0">
                            <div class="card card-gutter-md">
                                <div class="card-row card-row-lg col-sep col-sep-lg">
                                    <div class="card-aside">
                                        <div class="card-body">
                                            <div class="bio-block">
                                                <h4 class="bio-block-title">Details</h4>
                                                <ul class="list-group list-group-borderless small">
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Employee ID:</span>
                                                        <span class="text">123456</span> <!-- Hardcoded employee ID -->
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Full Name:</span>
                                                        <span class="text">John Doe</span> <!-- Hardcoded full name -->
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Email:</span>
                                                        <span class="text">john@example.com</span> <!-- Hardcoded email -->
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Address:</span>
                                                        <span class="text">City, Country</span> <!-- Hardcoded address -->
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Joining Date</span>
                                                        <span class="text">2024-03-13</span> <!-- Hardcoded joining date -->
                                                    </li>
                                                </ul>
                                            </div><!-- .bio-block -->
                                            
                                        </div><!-- .card-body -->
                                        
                                    </div>
                                    <div class="card-content col-sep">
                                        <div class="card-body">
                                            <div class="bio-block">
                                                <h4 class="bio-block-title">About Me</h4>
                                                <p><strong>About me content goes here.</strong></p> <!-- Hardcoded about me content -->
                                                <div class="row g-gs">
                                                    <div class="col-lg-6">
                                                        <div class="small">Designation:</div>
                                                        <h5 class="small">Software Developer</h5> <!-- Hardcoded designation -->
                                                    </div><!-- .col -->
                                                    <div class="col-lg-6">
                                                        <div class="small">Website:</div>
                                                        <h5 class="small">www.infinecs.com</h5> <!-- Hardcoded website -->
                                                    </div><!-- .col -->
                                                </div><!-- .row -->
                                            </div><!-- .bio-block -->
                                            
                                        </div><!-- .card-body -->
                                    </div><!-- .card-content -->
                                </div><!-- .card-row -->
                            </div><!-- .card -->
                            
                        </div><!-- .tab-pane -->
                        <div class="tab-pane" id="tab-2">
    <div class="card card-gutter-md">
        <div class="card-row card-row-lg col-sep col-sep-lg">
            <div class="card-aside">
                <div class="card-body">
                    <div class="bio-block">
                    <h4>Summary</h4>
    <p>This is where you can add content specific to the second tab.</p>
</div>

                </div><!-- .card-body -->
            </div>
            <div class="card-content col-sep">
                <div class="card-body">
                    <div class="bio-block">
                    <h4>Job Discription</h4>
                    <p>Participate in the full software development lifecycle, including analysis, design, test, and delivery. Develop web applications using a variety of languages and technologies. Facilitate design and architecture brainstorms. Participate in code reviews.</p>
</div>
                </div><!-- .card-body -->
            </div><!-- .card-content -->
        </div><!-- .card-row -->
    </div><!-- .card -->
</div><!-- .tab-pane -->

<div class="tab-pane" id="tab-3">
    <div class="card card-gutter-md">
        <div class="card-row card-row-lg col-sep col-sep-lg">
            <div class="card-aside">
                <div class="card-body">
                    <div class="bio-block">
                    <h4>Notes</h4>
    <p>This is where you can add content specific to the second tab.</p>
</div>
                </div><!-- .card-body -->
            </div>
            <div class="card-content col-sep">
                <div class="card-body">
                    <div class="bio-block">
                    <p>This is where you can add content specific to the second tab.</p>
</div>
                </div><!-- .card-body -->
            </div><!-- .card-content -->
        </div><!-- .card-row -->
    </div><!-- .card -->
</div><!-- .tab-pane -->
<div class="tab-pane" id="tab-4">
    <div class="card card-gutter-md">
        <div class="row">
            <div class="col-lg-6" style="border-right: 1px solid #dddddd;">
                <div class="card-aside col-sep">
                    <div class="card-body col-sep">
                        <div class="bio-block">
                    <h4>Attachments</h4>
                    <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">
  <thead>
    <tr style="background-color: purple; color: white;">
      <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">No.</th>
      <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Resume</th>
      <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr style="background-color: #f2f2f2;">
      <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"></td>
      <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"></td>
      <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">
            <div class="dropdown d-flex justify-content-center">
                <a href="#" class="btn btn-sm btn-icon btn-zoom" data-bs-toggle="dropdown">
                    <em class="icon ni ni-more-v"></em>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                    <div class="dropdown-content py-1">
                        <ul class="link-list link-list-hover-bg-primary link-list-md">
                            <li>
                                <a href="" onclick="return showDeleteConfirmation(event, this)">
                                    <em class="icon ni ni-trash"></em>
                                    <span>Delete</span>
                                    </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- dropdown -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-content col-sep">
                    <div class="card-body">
                        <div class="bio-block">
                            <h4>Attachments</h4>
                            <p>This is where you can add content specific to the second tab.</p>
                            <div class="form-group">
                                <label for="dropzoneFile1" class="form-label">Default Dropzone</label>
                                <div class="form-control-wrap">
                                    <div class="js-upload" id="dropzoneFile1">
                                        <div class="dz-message" data-dz-message>
                                            <div class="dz-message-icon"></div>
                                            <span class="dz-message-text">Drag and drop file</span>
                                            <div class="dz-message-btn mt-2">
                                                <button class="btn btn-md btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     
@endsection
