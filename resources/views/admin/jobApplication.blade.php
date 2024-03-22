@extends('layout.appAdmin')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h1 class="nk-block-title">Job Applications</h1>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Job Applications</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                                <li>
                                    <a href="/admin/addJobApplication" class="btn btn-primary btn-md d-md-none">
                                        <em class="icon ni ni-plus"></em>
                                        <span>Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/addJobApplication" class="btn btn-primary d-none d-md-inline-flex">
                                        <em class="icon ni ni-plus"></em>
                                        <span>Add Job Application</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
    <div class="card">
        <div class="card-body">
                <form action="{{ route('admin.jobApplication2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="form-group" >
                            <label for="excelFile" class="form-label" style=" margin-left: 100px;">Upload Data Excel File:</label>
                            <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls,.xlsx" style="width: 200%; margin-left: 150px;">
                        </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                        
                            <button type="submit" id="uploadButton" class="btn btn-primary" style="margin-top: 30px; margin-left: 500px; ">Upload</button>
                            </form>
                            </div>
                            </div>
                            </div>
        <!-- Filter Section -->
<div class="nk-block">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.jobApplication') }}" method="GET">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterJobType">Job Type:</label>
                            <select class="form-control" id="filterJobType" name="jobType">
                                <option value="" disabled selected>Select Job Type</option>
                                <option value="Experienced" {{ request('jobType') == 'Experienced' ? 'selected' : '' }}>Experienced</option>
                                <option value="FreshGraduate" {{ request('jobType') == 'FreshGraduate' ? 'selected' : '' }}>Fresh Graduate</option>
                                <option value="Internship" {{ request('jobType') == 'Internship' ? 'selected' : '' }}>Internship</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterQualification">Qualification:</label>
                            <input type="text" class="form-control" id="filterQualification" name="qualification" placeholder="Filter by Qualification" value="{{ request('qualification') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filterPosition">Position Applied:</label>
                            <select class="form-control" id="filterPosition" name="position">
                                <option value="">Select Position</option>
                                <option value="Graduate Trainee" {{ request('position') == 'Graduate Trainee' ? 'selected' : '' }}>Graduate Trainee</option>
                                <option value="Software Engineer" {{ request('position') == 'Software Engineer' ? 'selected' : '' }}>Software Engineer</option>
                                <option value="Embedded Software Engineer" {{ request('position') == 'Embedded Software Engineer' ? 'selected' : '' }}>Embedded Software Engineer</option>
                                <option value="Design for Test (DFT) Engineer" {{ request('position') == 'Design for Test (DFT) Engineer' ? 'selected' : '' }}>Design for Test (DFT) Engineer</option>
                                <option value="Physical Design Engineer (ASIC)" {{ request('position') == 'Physical Design Engineer (ASIC)' ? 'selected' : '' }}>Physical Design Engineer (ASIC)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="dateRange">Date Range:</label>
                            <div class="input-daterange input-group">
                                <input type="date" class="form-control" id="filterDateFrom" name="dateFrom" placeholder="Start Date" value="{{ request('dateFrom') }}" format="yyyy-MM-dd">
                                <div class="input-group-text">to</div>
                                <input type="date" class="form-control" id="filterDateTo" name="dateTo" placeholder="End Date" value="{{ request('dateTo') }}" format="yyyy-MM-dd">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group"  >
                            <button type="submit" class="btn btn-primary" >Filter</button>
                            <a href="{{ route('admin.jobApplication') }}" class="btn btn-secondary" >Clear Filters</a>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>


                <!-- Filter Criteria -->
                @if(request('jobType') || request('qualification') || request('position') || request('dateFrom')| request('dateTo'))
                <div class="nk-block">
                    <div class="card">
                        <div class="card-body">
                            <strong>Filter Criteria:</strong>
                            @if(request('jobType'))
                            <span class="badge rounded-pill text-bg-primary">{{ request('jobType') }}</span>
                            @endif
                            @if(request('qualification'))
                            <span class="badge rounded-pill text-bg-primary">{{ request('qualification') }}</span>
                            @endif
                            @if(request('position'))
                            <span class="badge rounded-pill text-bg-primary">{{ request('position') }}</span>
                            @endif
                            @if(request('dateFrom') && request('dateTo'))
                            <span class="badge rounded-pill text-bg-primary">Date From: {{ request('dateFrom') }}    Date To: {{ request('dateTo') }}</span>
                             @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Job Applications Table -->

                <div class="nk-block">
                                <div class="card">
                                    <div class="card-body">
                                        @include('inc.message')
                                        
                                        <table class="datatable-init table small-font-datatable" data-nk-container="table-responsive table-border">
                                            <thead>
                                                <tr>
                                                    <th><span class="overline-title">No.</span></th>
                                                    <th><span class="overline-title">Name</span></th>
                                                    <th><span class="overline-title">Email</span></th>
                                                    <th><span class="overline-title">Contact No</span></th>
                                                    <th><span class="overline-title">Position Applied</span></th>
                                                    <th><span class="overline-title">Job Type</span></th>
                                                    <th><span class="overline-title">Date Applied</span></th>
                                                    <th><span class="overline-title">Qualification</span></th>
                                                    <th><span>Action</span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="jobApplicationsTable">
                                                @foreach($jobapplicationData as $key => $Data)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><a style="font-weight:bold;" href="admin/applicationView/{{ $Data->ApplicationID }}">{{$Data->FirstName}}</td>
                                                    <td>{{$Data->Email}}</td>
                                                    <td>{{$Data->ContactNo}}</td>
                                                    <td>{{$Data->PositionApplied}}</td>
                                                    <td>{{$Data->JobType}}</td>
                                                    <td>{{$Data->DateCreate}}</td>
                                                    <td>{{$Data->Qualification}}</td>
                                                    <td>
                                            <div class="dropdown d-flex justify-content-center">
                                                <a href="#" class="btn btn-sm btn-icon btn-zoom" data-bs-toggle="dropdown">
                                                    <em class="icon ni ni-more-v"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <div class="dropdown-content py-1">
                                                        <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                            <li>
                                                            <a href="/admin/editJobApplication/{{ $Data->ApplicationID }}">
                                                                    <em class="icon ni ni-edit"></em>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/admin/applicationDelete/{{$Data->ApplicationID}}" onclick="return showDeleteConfirmation(event, this)">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ asset('Resume/' . $Data->UploadResume) }}" target="_blank">
                                                                    <em class="icon ni ni-file-pdf"></em>
                                                                    <span>View Resume</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a type="button" class="btn" data-bs-toggle="modal" onclick="showJobApplicationDetails({{ $Data->ApplicationID }})" data-bs-target="#scrollable" style="display: inline-block; vertical-align: middle; text-align: left;">
                                                                    <em  class="icon ni ni-eye"></em>
                                                                    <span >View Details</span>
                                                                </a>
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
                        <script>
    @if(session('success'))
        toast('{{ session('success') }}', 'success');
    @elseif(session('error'))
        toast('{{ session('error') }}', 'error');
    @endif
</script>





                    <div class="modal fade" id="scrollable" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scrollableLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableLabel"> Application Details </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body" style="font-size: 20px;">
                <p><strong>Application ID:</strong> <span id="applicationId"></span></p>
                <p><strong>Job Type:</strong> <span id="jobType"></span></p>
                <p><strong>Name:</strong> <span id="name"></span></p>
                <p><strong>Nationality:</strong> <span id="nationality"></span></p>
                <p><strong>Contact No:</strong> <span id="contactNo"></span></p>
                <p><strong>Email:</strong> <span id="email"></span></p>
                <p><strong>University/Institute:</strong> <span id="universityInstitute"></span></p>
                <p><strong>Field of Study:</strong> <span id="fieldOfStudy"></span></p>
                <p><strong>Qualification:</strong> <span id="qualification"></span></p>
                <p><strong>Qualification Grade:</strong> <span id="qualificationGrade"></span></p>
                <p><strong>Internship Period:</strong> <span id="internshipPeriod"></span></p>
                <p><strong>Years of Experience:</strong> <span id="yearsOfExperience"></span></p>
                <p><strong>Job Specialization:</strong> <span id="jobSpecialization"></span></p>
                <p><strong>Notice Period:</strong> <span id="noticePeriod"></span></p>
                <p><strong>Position Applied:</strong> <span id="positionApplied"></span></p>
                <p><strong>Current Position:</strong> <span id="currentPosition"></span></p>
                <p><strong>Current Company:</strong> <span id="currentCompany"></span></p>
                <p><strong>Current Salary:</strong> <span id="currentSalary"></span></p>
                <p><strong>Expected Salary:</strong> <span id="expectedSalary"></span></p>
                <p><strong>Status:</strong> <span id="status"></span></p>
                <p><strong>Date Applied:</strong> <span id="dateApplied"></span></p>
                <p><strong>Residence Status:</strong> <span id="residenceStatus"></span></p>
                <p><strong>In MY:</strong> <span id="inMY"></span></p>
                <p><strong>EP Status:</strong> <span id="epStatus"></span></p>
                <p><strong>Notice Period Negotiable:</strong> <span id="noticePeriodNegotiable"></span></p>
                </div>
                
                
                 <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>

                    </div><!-- .card -->
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
</div> <!-- .nk-content -->

<script>
    function showJobApplicationDetails(applicationId) {
        // Make AJAX request to fetch application data
        $.ajax({
            url: '/admin/applicationDetails/' + applicationId,
            type: 'GET',
            success: function(data) {
                // Populate modal content with received data
                $('#applicationId').text(data.ApplicationID);
                $('#jobType').text(data.JobType);
                $('#name').text(data.FirstName + ' ' + data.LastName);
                $('#nationality').text(data.Nationality);
                $('#contactNo').text(data.ContactNo);
                $('#email').text(data.Email);
                $('#universityInstitute').text(data.UniversityInstitute);
                $('#fieldOfStudy').text(data.FieldOfStudy);
                $('#qualification').text(data.Qualification);
                $('#qualificationGrade').text(data.QualificationGrade);
                $('#internshipPeriod').text(data.InternshipPeriod);
                $('#yearsOfExperience').text(data.YearsOfExperience);
                $('#jobSpecialization').text(data.JobSpecialization);
                $('#noticePeriod').text(data.NoticePeriod);
                $('#positionApplied').text(data.PositionApplied);
                $('#currentPosition').text(data.CurrentPosition);
                $('#currentCompany').text(data.CurrentCompany);
                $('#currentSalary').text(data.CurrentSalary + ' ' + data.CurrentSalaryUnit);
                $('#expectedSalary').text(data.ExpectedSalary);
                $('#status').text(data.Status);
                $('#dateApplied').text(data.DateCreate);
                $('#residenceStatus').text(data.ResidenceStatus);
                $('#inMY').text(data.InMY);
                $('#epStatus').text(data.EPStatus);
                $('#noticePeriodNegotiable').text(data.NoticePeriodNegotiable);

        
                
            }
        });
    }


    $(document).on('click', '#filterButton', function() {
    // Gather filter input values
    var jobType = $('#filterJobType').val();
    var qualification = $('#filterQualification').val();
    var position = $('#filterPosition').val();
    var dateFrom = $('#filterDateFrom').val();
    var dateTo = $('#filterDateTo').val();

    // Construct the query parameters
    var queryParams = {
        jobType: jobType,
        qualification: qualification,
        position: position,
        dateFrom: dateFrom,
        dateTo: dateTo
    };

    // Make AJAX request to fetch filtered data
    $.ajax({
        url: '/admin/jobApplication', // URL for fetching filtered data
        type: 'GET',
        data: queryParams,
        success: function(data) {
            // Replace table body with filtered data
            $('#jobApplicationsTable').html(data);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error('AJAX Error:', error);
        }
    });
});
</script>


<script>


$(document).ready(function() {
    // Click event listener for the upload button
    $(document).on('click', '#uploadButton', function() {
        // Perform actions when the upload button is clicked
        // For example, you can trigger the file input click event to open the file dialog
        $('#excelFile').click();
    });
});
</script>

<script>
    $(document).ready(function() {
        $('#filterDateFrom').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            }
        });
        $('#filterDateTo').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            }
        });
        $('#filterDateFrom, #filterDateTo').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });
        $('#filterDateFrom, #filterDateTo').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>
    
@endsection
