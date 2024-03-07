@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Edit Asset</h1>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Assets</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Asset</li>
                                    </ol>
                                </nav>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                                <li>
                                    <a href="/admin/assetList" class="btn btn-primary btn-md d-md-none">
                                        <em class="icon ni ni-eye"></em>
                                        <span>View</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/assetList" class="btn btn-primary d-none d-md-inline-flex">
                                        <em class="icon ni ni-eye"></em>
                                        <span>View Assets</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-block-head-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <form action="{{ route('assetEditCommit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach ($asset as $assets)
                        <div class="row g-gs">
                            <div class="col-xxl-9">
                            <form action="" method="POST">
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
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="asset_tag">Asset tag</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" placeholder="Asset tag" id="" name="assetTag" value="{{ $assets->asset_tag}}">
                                                                <span id="asset-tag-validation-msg" style="font-size: smaller; color: red;"></span>

                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Serial Number</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" placeholder="Serial Number" id="" name="serialNumber" value="{{ $assets->serial }}">
                                                                <span id="serial-number-validation-msg" style="font-size: smaller; color: red;"></span>
                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Brand</label>
                                                            <div class="form-control-wrap">
                                                                <select class="js-select" data-search="true" data-sort="false" name="brand">
                                                                    <option value="{{ $assets->brand_id}}" selected>{{ $assets->brand_name}}</option>
                                                                        @foreach ($brand as $brands)
                                                                            <!-- Only show brands that are not selected -->
                                                                            @if($assets->brand_id !== $brands->id)
                                                                                <option value="{{$brands->id}}">{{$brands->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                </select>
                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                </div>
                                                <div class="row g-gs">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Model Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" placeholder="Model Name" name="modelName" value="{{ $assets->model }}">
                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Category</label>
                                                            <div class="form-control-wrap">
                                                                <select class="js-select" data-search="true" data-sort="false" name="category">
                                                                    <option value="{{ $assets->category_id}}" selected>{{ $assets->category_name}}</option>
                                                                    @foreach ($category as $categories)
                                                                            @if($assets->category_id !== $categories->id)
                                                                                <option value="{{$categories->id}}">{{$categories->name}}</option>
                                                                            @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Status</label>
                                                            <div class="form-control-wrap">
                                                                <select class="js-select" data-search="true" data-sort="false" name="status">
                                                                    <option value="{{ $assets->status_id}}" selected>{{ $assets->status_name}}</option>
                                                                    @foreach ($status as $statuss)
                                                                    @if($assets->status_id !== $statuss->id)
                                                                    <option value="{{$statuss->id}}">{{$statuss->name}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                </div>
                                                <div class="row g-gs">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Checked Out To</label>
                                                            <div class="form-control-wrap">
                                                                <select class="js-select" data-search="true" data-sort="false" name="checkedOutTo">
                                                                    <option value="{{ $assets->employee_id}}">{{ $assets->employee_name}}</option>
                                                                    @foreach ($userAll as $userAlls)
                                                                    @if($assets->employee_id !== $userAlls->id)
                                                                    <option value="{{$userAlls->employee_id}}">{{$userAlls->name}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Location</label>
                                                            <div class="form-control-wrap">
                                                                <select class="js-select" data-search="true" data-sort="false" name="location">
                                                                    <option value="{{ $assets->location_id}}">{{ $assets->location_name}}</option>
                                                                    @foreach ($location as $locations)
                                                                    @if($assets->location_id !== $locations->id)
                                                                    <option value="{{$locations->id}}">{{$locations->name}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                </div>
                                                <div class="row g-gs">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Current Market Value</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" placeholder="eg.: RM2000" name="currentMarketValue" value="{{ $assets->current_value}}">
                                                            </div>
                                                        </div><!-- .form-group -->
                                                    </div><!-- .col -->
                                                </div>
                                            </div><!-- .card-body -->
                                        </div><!-- .card -->
                                    </div><!-- .gap-col -->
                                    <div class="gap-col">
                                        <ul class="d-flex align-items-center gap g-3">
                                            <li>
                                                <button type="submit" id="submitButton" class="btn btn-warning">Update Asset</button>
                                            </li>
                                            <li>
                                                <a href="./html/ecommerce/products.html" class="btn btn-primary">Cancel</a>
                                            </li>
                                            <li >
                                                <a href="/admin/assetList" class="btn btn-primary btn-md d-md-none" >
                                                    <em class="icon ni ni-eye"></em>
                                                    <span>View</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- .gap-col -->
                                    @endforeach
                                </form>
                                </div><!-- gap -->
                            </div><!-- .col -->
                            <div class="col-xxl-3">
                            <div class="card card-gutter-md">
    <div class="card-body">
        <div class="row g-gs">
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label">Asset Image</label>
                    <div class="form-control-wrap">
                        <div class="image-upload-wrap d-flex flex-column align-items-center">
                            <div class="media media-huge border">
                                <img id="image-result" class="w-100 h-100" src="{{ isset($assets) ? $assets->device_image : '' }}" alt="avatar">
                            </div>
                            <div class="pt-3">
                                <input class="upload-image" name="deviceimage" id="change-deviceimage" type="file" max="1" hidden onchange="previewImage(this)">
                                <button type="button" class="btn btn-primary mt-2" id="uploadButton" onclick="document.getElementById('change-deviceimage').click()">Upload Image</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                                        </div><!-- end image-upload-wrap -->
                                                    </div>
                                                    <div class="form-note mt-3">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.</div>
                                                </div><!-- .form-group -->
                                            </div><!-- .col -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-gutter-md">
                                    <div class="card-body">
                                        <div class="row g-gs">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Asset Signed Document</label>
                                                    <div class="form-control-wrap">
                                                        <div class="image-upload-wrap d-flex flex-column align-items-center">
                                                            <div class="media media-huge border">
                                                                <img id="image-result" class="w-100 h-100" src="./images/avatar/avatar-placeholder.jpg" alt="avatar">
                                                            </div>
                                                            <div class="pt-3">
                                                                <input class="upload-image" data-target="image-result" id="change-avatar" type="file" max="1" hidden>
                                                                <label for="change-avatar" class="btn btn-md btn-primary">Upload</label>
                                                            </div>
                                                        </div><!-- end image-upload-wrap -->
                                                    </div>
                                                    <div class="form-note mt-3">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.</div>
                                                </div><!-- .form-group -->
                                            </div><!-- .col -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .row -->
                    </form>
                </div><!-- nk-block -->
            </div><!-- .nk-content-body -->
        </div><!-- .content-inner -->
    </div><!-- .container-fluid -->
</div><!-- .nk-content -->



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