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
                                        <img src="./images/avatar/a.jpg" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="mt-3 mt-md-0 ms-md-3">
                                        <h3 class="title mb-1">{{$user->name}}</h3>
                                        <span class="small">{{ ucfirst(trans($user->role)) }}</span>
                                        <ul class="nk-list-option pt-1">
                                            <li><em class="icon ni ni-map-pin"></em><span class="small">{{$profile->state}} , {{$profile->country}}</span></li>
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
                                    <a href="{{ url()->previous() }}" class="btn btn-soft btn-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                </li>
                                <li class="d-md-none">
                                    <a href="./html/user-manage/user-edit.html" class="btn btn-soft btn-primary btn-icon"><em class="icon ni ni-edit"></em></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-block-head-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-gutter-md">
                        <div class="card-body">
                            <div class="bio-block">
                                <h4 class="bio-block-title mb-4">Edit Profile</h4>
                                <form action="#">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="firstname" class="form-label">First Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="firstname" placeholder="First name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastname" class="form-label">Last Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="lastname" placeholder="Last name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Username</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email address</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="email" placeholder="Email address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="company" class="form-label">Company</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="company" placeholder="Company name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="address" class="form-label">Address</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="address" placeholder="e.g. California, United States">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="city" class="form-label">City</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="city" placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="country" class="form-label">Country</label>
                                                <div class="form-control-wrap">
                                                    <select class="js-select" id="country" data-search="true" data-sort="false">
                                                        <option value="">Select a country</option>
                                                        <option value="1">Germany</option>
                                                        <option value="2">Canada</option>
                                                        <option value="3">Usa</option>
                                                        <option value="4">Aus</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="postalcode" class="form-label">Postal Code</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="postalcode" placeholder="Zip code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="aboutme" class="form-label">About Me</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control" id="aboutme" rows="3">On the other hand, we denounce with righteous indignation</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="btn btn-primary" type="submit">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- .bio-block -->
                        </div><!-- .card-body -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div> <!-- .nk-content -->
@endsection