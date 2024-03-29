@section('title') 
Profile
@endsection 
@extends('userdashboard.layouts.main')
@section('style')
@endsection 
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-7 align-self-center">
            <div class="d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 align-self-center text-end">
            <button onclick="history.back()" class="btn waves-effect waves-light btn-rounded m-l-15 text-white btn-xs btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <img src="{{ (!empty(Auth::user()->profile_photo))? url(Auth::user()->profile_photo_path):url('noimage/no_image.jpg') }}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                        <h6 class="card-subtitle">{{Auth::user()->email}}</h6>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    <small class="text-muted">Email address </small>
                    <h6>{{Auth::user()->email}}</h6>
                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6>{{Auth::user()->number}}</h6>
                    <small class="text-muted p-t-30 db">Description</small>
                    <h6>{{Auth::user()->description}}</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material from-prevent-multiple-submits" method="POST" action="{{route('user.my.profile.update', Auth::user()->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Profile Picture</label>
                                    <div class="col-md-12">
                                        <input type="file" name="profile_photo" id="input-file-now-custom-1" class="dropify" data-allowed-file-extensions="jpg png" data-max-file-size="1m" data-default-file="{{ (!empty(Auth::user()->profile_photo))? url(Auth::user()->profile_photo_path):url('adminProfileImages/no_image.jpg') }}" />
                                        <div id="carousel_image_error"></div>
                                        @error('profile_photo')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe" name="name" value="{{Auth::user()->name}}" class="form-control form-control-line">
                                        @error('name')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="email" value="{{Auth::user()->email}}" id="example-email">
                                        @error('email')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line" name="number" value="{{Auth::user()->number}}">
                                        @error('number')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" name="description">{!! Auth::user()->description !!}</textarea>
                                        @error('description')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="register" class="btn btn-primary text-white from-prevent-multiple-submits"><i class="spinner fa fa-spinner fa-spin"></i> Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
@endsection 
@section('script')
@endsection