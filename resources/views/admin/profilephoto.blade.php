@extends('layout.appAdmin')

@section('content')

<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data" id="uploadForm">
    @csrf

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="card card-gutter-md">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Profile Image</label>
                            <div class="form-control-wrap">
                                <div class="image-upload-wrap d-flex flex-column align-items-center">
                                    <div class="media media-huge border">
                                        <img id="image-result" class="w-100" style="max-height: 400px;" src="{{ asset($profile->avatar ?? 'images/avatar/avatar-placeholder.jpg') }}" alt="avatar">
                                    </div>
                                    <div class="pt-3">
                                        <!-- Hidden file input -->
                                        <input class="upload-image" name="avatars" id="change-avatar" type="file" max="1" hidden onchange="previewImage(this)">
                                        <!-- Upload button -->
                                        <button type="button" class="btn btn-primary mt-2" id="uploadButton" onclick="document.getElementById('change-avatar').click()">Upload Image</button>
                                        <!-- Save button -->
                                        <button type="submit" class="btn btn-success mt-2" id="saveButton">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image-result').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
@endsection
