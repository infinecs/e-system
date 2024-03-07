@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title">Asset List</h1>
                        <nav>
                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                                <li class="breadcrumb-item">Asset Management</li>
                                <li class="breadcrumb-item active" aria-current="page">Asset List</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="d-flex">
                            <li>
                                <a href="/admin/assetAdd" class="btn btn-primary btn-md d-md-none">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/assetAdd" class="btn btn-primary d-none d-md-inline-flex">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add Asset</span>
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
                                        <th><span class="overline-title">Device Image</span></th>
                                        <th><span class="overline-title">Asset Tag</span></th>
                                        <th><span class="overline-title">Serial Number</span></th>
                                        <th><span class="overline-title">Brand</span></th>
                                        <th><span class="overline-title">Model</span></th>
                                        <th><span class="overline-title">Category</span></th>
                                        <th><span class="overline-title">Status</span></th>
                                        <th><span class="overline-title">Checked Out To</span></th>
                                        <th><span class="overline-title">Location</span></th>
                                        <th><span class="overline-title">Device Name</span></th>
                                        <th><span class="overline-title">Operating System</span></th>
                                        <th><span class="overline-title">Current Value</span></th>
                                        <th><span>Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($assetData as $key => $Data)
                                <tr>
    <td>{{ $key + 1 }}</td>
    <td>
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#scrollable{{$key}}">
            <img src="{{ asset('asset_image/' . basename($Data->device_image)) }}" style="width: 300px; height: 50px;" alt="Device Image">
        </button>
        
        <div class="modal fade" id="scrollable{{$key}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scrollableLabel{{$key}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollableLabel{{$key}}">Device Image Enlarged</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('asset_image/' . basename($Data->device_image)) }}" style="width: 100%;" alt="Device Image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </td>
                                        <td>{{$Data->asset_tag}}</td>
                                        <td>{{$Data->serial}}</td>
                                        <td>{{$Data->brand_name}}</td>
                                        <td>{{$Data->model}}</td>
                                        <td>{{$Data->category_name}}</td>
                                        <td> 
                                            @if($Data->status == "1")
                                                <span class="badge text-bg-success-soft">Deployed</span>
                                            @elseif($Data->status == "2")
                                                <span class="badge text-bg-primary-soft">Ready to deploy</span>
                                            @elseif($Data->status == "3")
                                                <span class="badge text-bg-warning-soft">Faulty</span>
                                            @else
                                                <span class="badge text-bg-danger-soft">Scrap</span>
                                            @endif
                                        </td>


                                        <td>{{$Data->employee_name}}</td>
                                        <td>{{$Data->location_name}}</td>
                                        <td>{{$Data->device_name}}</td>
                                        <td>{{$Data->operating_system}}</td>
                                        <td>RM {{$Data->current_value}}</td>
                                        <td>
                                            <div class="dropdown d-flex justify-content-center  ">
                                                <a href="#" class="btn btn-sm btn-icon btn-zoom" data-bs-toggle="dropdown">
                                                    <em class="icon ni ni-more-v"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <div class="dropdown-content py-1">
                                                        <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                            <li>
                                                                <a onclick="openPrintPreview()"><em class="icon ni ni-printer"></em><span>Print</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="/admin/assetEdit/{{$Data->asset_tag}}"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="/admin/assetDelete/{{$Data->asset_tag}}" onclick="return showDeleteConfirmation(event, this)">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Delete</span>
                                                                </a>
                                                            <li>
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
<script>
    function setModalImage(imageSource) {
        document.getElementById('modal-image').src = imageSource;
    }
</script>
@endsection