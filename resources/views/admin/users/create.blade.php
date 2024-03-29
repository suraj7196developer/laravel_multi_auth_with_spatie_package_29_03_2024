@section('title') 
User
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
               <h4 class="card-title">Add @yield('title')</h4>
               <div class="col-sm-12 col-xs-12">
                  <form class="from-prevent-multiple-submits" method="POST" action="{{route('users.store')}}" onsubmit="return Validate()" name="vform">
                     @csrf
                     <div class="row">
                        <div class="col-lg-4" id="username_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Name</label>
                              <input type="text" name="name" value="{{old('name')}}" class="form-control textInput" id="name" placeholder="Enter User Name">
                              <div id="name_error"></div>
                              @error('name')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-4" id="email_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Email</label>
                              <input type="email" name="email" value="{{old('email')}}" class="form-control textInput" id="email" placeholder="Enter email">
                              <div id="email_error"></div>
                              @error('email')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Mobile No</label>
                              <input type="text" name="number" value="{{old('number')}}" class="form-control textInput" placeholder="Enter Customer Mobile number">
                              @error('number')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6" id="role_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Role</label>
                              <select class="form-control textInput" id="val-skill" name="role_id">
                                 <option>Please select</option>
                                 @foreach($roles as $item)
                                 <option value="{{old('role_id', $item->id)}}">{{$item->name}}</option>
                                 @endforeach
                                 <div id="role_error"></div>
                                 @error('role_id')
                                 <label class="error">{{ $message }}</label>
                                 @enderror
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6" id="siep_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">SIEP</label>
                              <select class="form-control textInput" id="val-skill" name="siep_id">
                                 <option>Please select</option>
                                 @foreach($siep as $item)
                                 <option value="{{old('siep_id', $item->id)}}">{{$item->siep_name}}</option>
                                 @endforeach
                                 <div id="siep_error"></div>
                                 @error('siep_id')
                                 <label class="error">{{ $message }}</label>
                                 @enderror
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Unit</label>
                              <select class="form-control textInput" id="unit_id" name="unit_id">
                                 <option>Please select</option>
                                 @foreach($unit as $item)
                                 <option value="{{old('unit_id', $item->id)}}">{{$item->unit_name}}</option>
                                 @endforeach
                                 @error('unit_id')
                                 <label class="error">{{ $message }}</label>
                                 @enderror
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Sub Unit</label>
                              <select class="form-control" name="subunit_id" id="subunit_id">
                                 <option value="">Please select</option>
                              </select>
                              @error('subunit_id')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Is Clinical Specialist</label>
                              <div class="row">
                                 <div class="col-lg-3">
                                    <input type="radio" value="1" id="clinical_status" name="clinical_status" class="form-check-input">
                                    <label class="form-check-label" for="customRadio11">Yes</label>
                                 </div>
                                 <div class="col-lg-3">
                                    <input type="radio" value="0" id="clinical_status" name="clinical_status" class="form-check-input">
                                    <label class="form-check-label" for="customRadio11">No</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6" id="password_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Password</label>
                              <input type="password" name="password" value="{{old('password')}}" class="form-control textInput" placeholder="Enter Password">
                              <div id="password_error"></div>
                              @error('password')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-6" id="pass_confirm_div">
                           <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                              <input type="password" name="password_confirm" value="{{old('password_confirm')}}" class="form-control textInput" placeholder="Enter Confirm Password">
                              <div id="password_error"></div>
                              @error('password_confirm')
                              <label class="error">{{ $message }}</label>
                              @enderror
                           </div>
                        </div>
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
var role = document.forms['vform']['role_id'];
var siep = document.forms['vform']['siep_id'];
var password = document.forms['vform']['password'];
var password_confirm = document.forms['vform']['password_confirm'];
// SELECTING ALL ERROR DISPLAY ELEMENTS
var name_error = document.getElementById('name_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');
// SETTING ALL EVENT LISTENERS
username.addEventListener('blur', nameVerify, true);
email.addEventListener('blur', emailVerify, true);
role.addEventListener('blur', roleVerify, true);
siep.addEventListener('blur', siepVerify, true);
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

// validate role
if (role.value == "") {
   role.style.border = "1px solid red";
   document.getElementById('role_div').style.color = "red";
   role_error.textContent = "Role is required";
   role.focus();
   return false;
}

// validate SIEP
if (siep.value == "") {
   siep.style.border = "1px solid red";
   document.getElementById('siep_div').style.color = "red";
   siep_error.textContent = "SIEP is required";
   siep.focus();
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

<script>
   $(document).ready(function(){
      /*State wise Districts*/
      $('select[name="unit_id"]').on('change',function(){
         var unit_id = $(this).val();
         if (unit_id) {
            $.ajax({
               url: "{{ url('/admin/users/unit/subunit') }}/"+unit_id,
               type:"GET",
               dataType:"json",
               success:function(data)
               {
                  if(data){
                     $('#subunit_id').empty();
                     $('#subunit_id').append('<option hidden>Choose Sub Unit</option>');
                     $.each(data, function(key, value){
                        $('select[name="subunit_id"]').append('<option value="'+ value.id +'">' + value.subunit_name + '</option>');
                     });
                  }else{
                     $('#subunit_id').empty();
                  }
               },
            });
         }else{
            alert('danger');
         }
      });
   });
</script>
@endsection