@section('title') 
User
@endsection 
@extends('userdashboard.layouts.main')
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
               <h4 class="card-title">Add @yield('title')</h4>
               <div class="col-sm-12 col-xs-12">
                  <form class="from-prevent-multiple-submits" method="POST" action="{{ route('admin.users.store')}}" onsubmit="return Validate()" name="vform">
                     @csrf
                     @method('post')
                     <div class="row">
                        <div class="col-lg-6" id="username_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">User Name</label>
                              <input type="text" name="name" value="{{ old('name') }}" class="form-control textInput" id="name" placeholder="Enter User Name">
                              <div id="name_error"></div>
                              @error('name')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-6" id="email_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Email</label>
                              <input type="email" name="email" value="{{old('email')}}" class="form-control textInput" id="email" placeholder="Enter email">
                              <div id="email_error"></div>
                              @error('email')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6" id="password_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Password</label>
                              <input type="text" name="password" value="{{ old('password') }}" class="form-control textInput" id="password" placeholder="Enter Password">
                              <div id="password_error"></div>
                              @error('password')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-6" id="pass_confirm_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                              <input type="text" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control textInput" id="password_confirmation" placeholder="Enter Confirm Password">
                              <div id="email_error"></div>
                              @error('password_confirmation')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <h3 class="text-xl my-4 text-gray-600">Role</h3>
                @foreach($roles as $role)
                        <div class="col-lg-3 col-md-6">
                           <div class="card">
                              <div class="card-body">
                                 <div class="d-flex flex-row">
                                    <div class="m-l-10 align-self-center">
                                       <h3 class="m-b-0"><input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]" value="{{$role->id}}"
                                  ></h3>
                                       <h5 class="text-muted m-b-0">{{ $role->name }}</h5>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                     <button type="submit" name="register" class="btn btn-primary text-white from-prevent-multiple-submits"><i class="spinner fa fa-spinner fa-spin"></i> Register</button>
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
var username = document.forms['vform']['name'];
var email = document.forms['vform']['email'];
var password = document.forms['vform']['password'];
var password_confirm = document.forms['vform']['password_confirmation'];
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
   name_error.textContent = "Name is required";
   username.focus();
   return false;
}
// validate username
if (username.value.length < 3) {
   username.style.border = "1px solid red";
   document.getElementById('username_div').style.color = "red";
   name_error.textContent = "Name must be at least 3 characters";
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
function roleVerify() {
   if (role.value != "") {
      role.style.border = "1px solid #5e6e66";
      document.getElementById('role_div').style.color = "#5e6e66";
      role_error.innerHTML = "";
      return true;
   }
}
function siepVerify() {
   if (siep.value != "") {
      siep.style.border = "1px solid #5e6e66";
      document.getElementById('siep_div').style.color = "#5e6e66";
      siep_error.innerHTML = "";
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