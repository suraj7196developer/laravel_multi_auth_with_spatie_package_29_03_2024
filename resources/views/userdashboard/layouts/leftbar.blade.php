<aside class="left-sidebar">
   <!-- Sidebar scroll-->
   <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
         <ul id="sidebarnav">
            <li class="user-pro">
               <a class="has-arrow waves-effect waves-dark" href="{{url('/')}}" aria-expanded="false"><img src="{{ (!empty(Auth::user()->profile_photo))? url(Auth::user()->profile_photo_path):url('noimage/no_image.jpg') }}" alt="user-img" class="img-circle"><span class="hide-menu">{{Auth::user()->name}}</span></a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="{{url('dashboard/my-profile', Auth::user()->id)}}"><i class="ti-user"></i> My Profile</a></li>
                  <li>
                     <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                  </form>
                  </li>
               </ul>
            </li>
            <li>
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Customers <span class="badge rounded-pill bg-cyan ms-auto">4</span></span></a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="{{url('/dashboard/customers')}}">All Customers</a></li>
                  <li><a href="{{url('/dashboard/customers/add')}}">Add Customer</a></li>
               </ul>
            </li>
            @can('User access')
            <li>
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Users <span class="badge rounded-pill bg-cyan ms-auto">4</span></span></a>
               <ul aria-expanded="false" class="collapse">
                  @can('User access')
                  <li><a href="{{ route('admin.users.index')}}">All Users</a></li>
                  @endcan
                  @can('User create')
                  <li><a href="{{ route('admin.users.create')}}">Add User</a></li>
                  @endcan
               </ul>
            </li>
            @endcan
            @can('Role access')
            <li>
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Role <span class="badge rounded-pill bg-cyan ms-auto">4</span></span></a>
               <ul aria-expanded="false" class="collapse">
                  @can('Role access')
                  <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                  @endcan
                  @can('Role create')
                  <li><a href="{{route('admin.roles.create')}}">Add Roles</a></li>
                  @endcan
               </ul>
            </li>
            @endcan
            @can('Permission access')
            <li>
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Permission <span class="badge rounded-pill bg-cyan ms-auto">4</span></span></a>
               <ul aria-expanded="false" class="collapse">
                  @can('Permission access')
                  <li><a href="{{ route('admin.permissions.index') }}">All Permission</a></li>
                  @endcan
                  @can('Permission create')
                  <li><a href="{{route('admin.permissions.create')}}">Add Permission</a></li>
                  @endcan
               </ul>
            </li>
            @endcan
         </ul>
      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</aside>