@extends('layout.appAdmin')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2 align-items-start">
                            <div class="nk-block-head-content">
                                <div class="d-flex flex-column flex-md-row align-items-md-center">
                                    <div class="media media-huge media-circle">
                                        <img src="profile_avatar/avatar_image.jpg" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="mt-3 mt-md-0 ms-md-3">
                                        <h3 class="title mb-1">{{$user->name}}</h3>
                                        <span class="small">{{ ucfirst(trans($user->role)) }}</span>
                                        <ul class="nk-list-option pt-1">
                                            @if ($profile)
                                            <li><em class="icon ni ni-map-pin"></em><span class="small">{{$profile->state}} , {{$profile->country}}</span></li>
                                            @else
                                            <li><em class="icon ni ni-map-pin"></em><span class="small">{{ 'No Data' }} , {{ 'No Data' }}</span></li>
                                             @endif

                                            <li><em class="icon ni ni-building"></em><span class="small">Infinecs Systems Sdn Bhd</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-head-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block-head-between gap g-2">
                        <div class="gap-col d-flex justify-content-end">
                            <ul class="gap g-2">
                                <li class="d-none d-md-block">
                                    <a href="/admin/profilephoto" class="btn btn-soft btn-success"><em class="icon ni ni-upload"></em><span>Upload New Photo</span></a>
                                </li>
                                <li class="d-md-none">
                                    <a href="/admin/profilephoto" class="btn btn-soft btn-success btn-icon"><em class="icon ni ni-upload"></em></a>
                                </li>
                            </ul>
                            &nbsp;
                            <ul class="gap g-2">
                                <li class="d-none d-md-block">
                                    <a href="/admin/profileEdit" class="btn btn-soft btn-primary"><em class="icon ni ni-edit"></em><span>Edit Profile</span></a>
                                </li>
                                <li class="d-md-none">
                                    <a href="/admin/profileEdit" class="btn btn-soft btn-primary btn-icon"><em class="icon ni ni-edit"></em></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-block-head-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="tab-content" id="myTabContent">
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
                                                        @if ($profile)
                                                        <span class="text">{{$profile->employeeId}}</span>
                                                        @else
                                                        <span class="text">{{'No Data'}}</span>
                                                        @endif
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Full Name:</span>
                                                        <span class="text">{{$user->name}}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Email:</span>
                                                        <span class="text">{{$user->email}}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Address:</span>
                                                        @if ($profile)
                                                        <span class="text">{{$profile->state}} , {{$profile->country}}</span>
                                                        @else
                                                        <span class="text">{{'No Data'}} , {{'No Data'}}</span>
                                                        @endif
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="title fw-medium w-40 d-inline-block">Joining Date</span>
                                                        @if ($profile)
                                                        <span class="text">{{$profile->join_date}}</span>
                                                        @else
                                                        <span class="text">{{'No Data'}}</span>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div><!-- .bio-block -->
                                        </div><!-- .card-body -->
                                    </div>
                                    <div class="card-content col-sep">
                                        <div class="card-body">
                                            <div class="bio-block">
                                                <h4 class="bio-block-title">About Me</h4>
                                                <p><strong>{{$profile->about}}</strong></p>
                                                <div class="row g-gs">
                                                    <div class="col-lg-6">
                                                        <div class="small">Designation:</div>
                                                        @if ($profile)
                                                        <h5 class="small">{{$profile->designation}}</h5>
                                                        @else
                                                        <h5 class="small">{{'No Data'}}</h5>
                                                        @endif
                                                    </div><!-- .col -->
                                                    <div class="col-lg-6">
                                                        <div class="small">Website:</div>
                                                        <h5 class="small">www.infinecs.com</h5>
                                                    </div><!-- .col -->
                                                </div><!-- .row -->
                                            </div><!-- .bio-block -->
                                        </div><!-- .card-body -->
                                    </div><!-- .card-content -->
                                </div><!-- .card-row -->
                            </div><!-- .card -->
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div> <!-- .nk-content -->
@endsection