<aside class="left-sidebar">
   <!-- Sidebar scroll-->
   <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
         <ul id="sidebarnav">
            <li class="user-pro">
               <a class="has-arrow waves-effect waves-dark" href="{{url('/')}}" aria-expanded="false"><img src="{{ asset('assets/assets/images/users/1.jpg') }}" alt="user-img" class="img-circle"><span class="hide-menu">{{Auth::user()->name}}</span></a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                  <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
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
                  <li><a href="{{url('/admin/customers')}}">All Customers</a></li>
                  <li><a href="{{url('/admin/customers/add')}}">Add Customer</a></li>
               </ul>
            </li>
            <li class="nav-small-cap">--- SUPPORT</li>
            <li> <a class="waves-effect waves-dark" href="../documentation/documentation.html" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Documentation</span></a></li>
            <li> <a class="waves-effect waves-dark" href="pages-login.html" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Log Out</span></a></li>
            <li> <a class="waves-effect waves-dark" href="pages-faq.html" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">FAQs</span></a></li>
         </ul>
      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</aside>