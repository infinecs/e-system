@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h1 class="nk-block-title">Job Application Details</h1>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Job Application Details</li>
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
                                                        <img src="./images/avatar/st.png" class="img-thumbnail" alt="">
                                                    </div>
                                                    <div class="mt-3 mt-md-0 ms-md-3">
                                                    <h3 class="title mb-1">{{ $jobApplication->FirstName }} {{ $jobApplication->LastName }}</h3>
                                                    <span class="small">{{ $jobApplication->PositionApplied }}</span>
                                                    <ul class="nk-list-option pt-1">
                                                        <li><em class="icon ni ni-mail"></em><span class="small">{{ $jobApplication->Email }}</span></li>
                                                        <li><em class="icon ni ni-contact"></em><span class="small">{{ $jobApplication->ContactNo }}</span></li>
                                                        <li><em class="icon ni ni-building"></em><span class="small">{{ $jobApplication->CurrentCompany }}</span></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head-content -->
                                            
                                            </div><!-- .nk-block-head-content -->
                                        </div><!-- .nk-block-head-between -->
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block-head-between gap g-2">
                            <div class="gap-col">
                                <ul class="nav nav-pills nav-pills-border gap g-3" role="tablist">
                                    <li class="nav-item " role="presentation">
                                        <button class="nav-link active" type="button" data-bs-toggle="tab" aria-selected="true" data-bs-target="#tab-1" tabindex="-1" role="tab">Summary</button>
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
                        <div class="bio-block">
                            <br>
                    <h4 class="text-center">Job Application Details</h4>
                </div>
                <div class="bio-block">
                <div class="row">
                    <div class="col-lg-6" style="border-right: 1px solid #dddddd;">
                        <div class="card-aside col-sep">
                            <div class="card-body col-sep">
                                @if($jobApplication)
                                <ul class="list-group list-group-borderless small">
                                    @foreach($jobApplication->getAttributes() as $key => $value)
                                    @if($loop->iteration <= count($jobApplication->getAttributes()) / 2)
                                    <li class="list-group-item">
                                        <span class="title fw-medium w-40 d-inline-block">{{ $key }}:</span>
                                        <span class="text">{{ $value }}</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                @else
                                <p>No job application found.</p>
                                @endif
                            </div>
                        </div><!-- .card-body -->
                    </div><!-- .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="card-aside col-sep">
                            <div class="card-body col-sep">
                                @if($jobApplication)
                                <ul class="list-group list-group-borderless small">
                                    @foreach($jobApplication->getAttributes() as $key => $value)
                                    @if($loop->iteration > count($jobApplication->getAttributes()) / 2)
                                    <li class="list-group-item">
                                        <span class="title fw-medium w-40 d-inline-block">{{ $key }}:</span>
                                        <span class="text">{{ $value }}</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                @else
                                <p>No job application found.</p>
                                @endif
                                
                                
                                
                                
                                </div>
            </div>
                </div><!-- .card-body -->
            </div>
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
                            <div id="notes-list-container" style="width: 300%;">
        <ul id="notes-list" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            @if(empty($notes))
                <li><em class="icon ni ni-bullet-fill"></em>No notes added</li>
            @else
                @foreach($notes as $note)
                    <li>{{ $note }}</li>
                @endforeach
                                    @endif
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-0 end-0 mt-4 me-5">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNotesModal">Add Notes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Tab 3 Content -->

        <!-- Add Notes Modal -->
        <div class="modal fade" id="addNotesModal" tabindex="-1" aria-labelledby="addNotesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNotesModalLabel">Add Notes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                <form id="addNotesForm">
                    <div class="mb-3">
                        <label for="notesInput" class="form-label">Notes:</label>
                        <div id="notesInputs">
                            <!-- Initial input field -->
                            <input type="text" class="form-control mb-2" placeholder="Enter note">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addNoteInput()">Add More</button>
                    </div>
                </form>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveNotes()">Save Notes</button>
                    </div>
                </div>
            </div>
        </div>

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
    <tr style="background-color: #6B4EF8; color: white;">
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
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>


    <script>
    function saveNotes() {
        var notesList = document.getElementById('notes-list');
        var inputs = document.querySelectorAll('#notesInputs input');
        var notes = [];

        // Collect notes from all input fields
        inputs.forEach(function(input) {
            var note = input.value.trim();
            if (note !== '') {
                notes.push('<li><em class="icon ni ni-bullet-fill"></em>' + note + '</li>');
            }
        });

        // Check if there are any notes
        if (notes.length === 0) {
            // Display a message if no notes are added
            notesList.innerHTML = '<li>No notes added</li>';
        } else {
            // Display all the notes
            notesList.innerHTML = notes.join('');
        }

        // Close the modal
        $('#addNotesModal').modal('hide');
    }

    function addNoteInput() {
        var notesInputs = document.getElementById('notesInputs');
        var newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.className = 'form-control mb-2';
        newInput.placeholder = 'Enter note';
        notesInputs.appendChild(newInput);
    }
</script>
     
@endsection
