@section('title') 
Permission
@endsection 
@extends('admin.layouts.main')
@section('style')

@endsection 
@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
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
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit @yield('title')</h4>
                    <div class="col-sm-12 col-xs-12">
                        <form class="from-prevent-multiple-submits" method="POST" action="{{route('update.permission',$permission->id)}}" onsubmit="return Validate()" name="vform">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12" id="username_div">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Role Name</label>
                                        <select class="form-control" id="val-skill" name="role_id">
                                            <option value="">Please select</option>
                                            @foreach(\App\Models\Role::all() as $role)
                                            <option value="{{old('role_id', $role->id)}}" @if($role->id == $permission->role_id) selected @endif>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        <div id="name_error"></div>
                                        @error('role_id')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="username_div">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Permission <span class="text-danger">*</span></label>
                                        <div class="col-lg-12">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Access</th>
                                                        <th scope="col">Add</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">View</th>
                                                        <th scope="col">Delete</th>
                                                        <th scope="col">List</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Customers</th>
                                                        <td><input type="checkbox" name="permission[customer][add]" value="1" @isset($permission['permission']['customer']['add']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[customer][edit]" value="1" @isset($permission['permission']['customer']['edit']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[customer][view]" value="1" @isset($permission['permission']['customer']['view']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[customer][delete]" value="1" @isset($permission['permission']['customer']['delete']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[customer][list]" value="1" @isset($permission['permission']['customer']['list']) checked @endisset></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">CWD Registration</th>
                                                        <td><input type="checkbox" name="permission[cwdregistration][add]" value="1" @isset($permission['permission']['cwdregistration']['add']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[cwdregistration][edit]" value="1" @isset($permission['permission']['cwdregistration']['edit']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[cwdregistration][view]" value="1" @isset($permission['permission']['cwdregistration']['view']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[cwdregistration][delete]" value="1" @isset($permission['permission']['cwdregistration']['delete']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[cwdregistration][list]" value="1" @isset($permission['permission']['cwdregistration']['list']) checked @endisset></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">PMR Consultation</th>
                                                        <td><input type="checkbox" name="permission[pmr][add]" value="1" @isset($permission['permission']['pmr']['add']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[pmr][edit]" value="1" @isset($permission['permission']['pmr']['edit']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[pmr][view]" value="1" @isset($permission['permission']['pmr']['view']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[pmr][delete]" value="1" @isset($permission['permission']['pmr']['delete']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[pmr][list]" value="1" @isset($permission['permission']['pmr']['list']) checked @endisset></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Specialist Consultation</th>
                                                        <td><input type="checkbox" name="permission[specialist][add]" value="1" @isset($permission['permission']['specialist']['add']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[specialist][edit]" value="1" @isset($permission['permission']['specialist']['edit']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[specialist][view]" value="1" @isset($permission['permission']['specialist']['view']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[specialist][delete]" value="1" @isset($permission['permission']['specialist']['delete']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[specialist][list]" value="1" @isset($permission['permission']['specialist']['list']) checked @endisset></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Clinical Specialist Consultation</th>
                                                        <td><input type="checkbox" name="permission[clinicalspecialist][add]" value="1" @isset($permission['permission']['clinicalspecialist']['add']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[clinicalspecialist][edit]" value="1" @isset($permission['permission']['clinicalspecialist']['edit']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[clinicalspecialist][view]" value="1" @isset($permission['permission']['clinicalspecialist']['view']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[clinicalspecialist][delete]" value="1" @isset($permission['permission']['clinicalspecialist']['delete']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[clinicalspecialist][list]" value="1" @isset($permission['permission']['clinicalspecialist']['list']) checked @endisset></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">PMR Aids & Appliences</th>
                                                        <td><input type="checkbox" name="permission[pmraidsapplience][add]" value="1" @isset($permission['permission']['pmraidsapplience']['add']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[pmraidsapplience][edit]" value="1" @isset($permission['permission']['pmraidsapplience']['edit']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[pmraidsapplience][view]" value="1" @isset($permission['permission']['pmraidsapplience']['view']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[pmraidsapplience][delete]" value="1" @isset($permission['permission']['pmraidsapplience']['delete']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[pmraidsapplience][list]" value="1" @isset($permission['permission']['pmraidsapplience']['list']) checked @endisset></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">HO Aids & Appliences</th>
                                                        <td><input type="checkbox" name="permission[hoaidsapplience][add]" value="1" @isset($permission['permission']['hoaidsapplience']['add']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[hoaidsapplience][edit]" value="1" @isset($permission['permission']['hoaidsapplience']['edit']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[hoaidsapplience][view]" value="1" @isset($permission['permission']['hoaidsapplience']['view']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[hoaidsapplience][delete]" value="1" @isset($permission['permission']['hoaidsapplience']['delete']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[hoaidsapplience][list]" value="1" @isset($permission['permission']['hoaidsapplience']['list']) checked @endisset></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Secretary Aids & Appliences</th>
                                                        <td><input type="checkbox" name="permission[secaidsapplience][add]" value="1" @isset($permission['permission']['secaidsapplience']['add']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[secaidsapplience][edit]" value="1" @isset($permission['permission']['secaidsapplience']['edit']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[secaidsapplience][view]" value="1" @isset($permission['permission']['secaidsapplience']['view']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[secaidsapplience][delete]" value="1" @isset($permission['permission']['secaidsapplience']['delete']) checked @endisset></td>
                                                        <td><input type="checkbox" name="permission[secaidsapplience][list]" value="1" @isset($permission['permission']['secaidsapplience']['list']) checked @endisset></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="email_error"></div>
                                        @error('permission')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="register" class="btn btn-primary text-white from-prevent-multiple-submits"><i class="spinner fa fa-spinner fa-spin"></i> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

@endsection 
@section('script')
<script type="text/javascript">
  // SELECTING ALL TEXT ELEMENTS
  var username = document.forms['vform']['role_id'];
  var email = document.forms['vform']['permission'];
  var password = document.forms['vform']['password'];
  var password_confirm = document.forms['vform']['password_confirm'];
// SELECTING ALL ERROR DISPLAY ELEMENTS
var name_error = document.getElementById('name_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');
// SETTING ALL EVENT LISTENERS
username.addEventListener('blur', nameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
// validation function
function Validate() {
  // validate username
  if (username.value == "") {
    username.style.border = "1px solid red";
    document.getElementById('username_div').style.color = "red";
    name_error.textContent = "Please select Role Type.";
    username.focus();
    return false;
}
  // validate email
  if (email.value == "") {
    email.style.border = "1px solid red";
    document.getElementById('email_div').style.color = "red";
    email_error.textContent = "Email is required";
    email.focus();
    return false;
}
  // validate password
  if (password.value == "") {
    password.style.border = "1px solid red";
    document.getElementById('password_div').style.color = "red";
    password_confirm.style.border = "1px solid red";
    password_error.textContent = "Password is required";
    password.focus();
    return false;
}
  // check if the two passwords match
  if (password.value != password_confirm.value) {
    password.style.border = "1px solid red";
    document.getElementById('pass_confirm_div').style.color = "red";
    password_confirm.style.border = "1px solid red";
    password_error.innerHTML = "The two passwords do not match";
    return false;
}
}
// event handler functions
function nameVerify() {
  if (username.value != "") {
   username.style.border = "1px solid #5e6e66";
   document.getElementById('username_div').style.color = "#5e6e66";
   name_error.innerHTML = "";
   return true;
}
}
function emailVerify() {
  if (email.value != "") {
    email.style.border = "1px solid #5e6e66";
    document.getElementById('email_div').style.color = "#5e6e66";
    email_error.innerHTML = "";
    return true;
}
}
function passwordVerify() {
  if (password.value != "") {
    password.style.border = "1px solid #5e6e66";
    document.getElementById('pass_confirm_div').style.color = "#5e6e66";
    document.getElementById('password_div').style.color = "#5e6e66";
    password_error.innerHTML = "";
    return true;
}
if (password.value === password_confirm.value) {
    password.style.border = "1px solid #5e6e66";
    document.getElementById('pass_confirm_div').style.color = "#5e6e66";
    password_error.innerHTML = "";
    return true;
}
}
</script>
@endsection