<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">KMS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>KMS</b> Dapentel</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
   <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      <li class="notifications-menu">
        <a href="#">
         <i class="glyphicon glyphicon-flag"></i> Notifikasi
       </a>
     </li>

     <!-- User Account: style can be found in dropdown.less -->
     <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-info-sign"></i>
        <span class="hidden-xs">{{$user->nama}}</span>
      </a>
      <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header"> 
          <p>
            {{$user->nik}} - {{$user->nama}}
            <small>{{$user->created_at}}</small>
            <br><br>
            <b>Level: {{$user->role->level}}</b>
          </p>
        </li>
        
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="pull-left">
            <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
          </div>
          <div class="pull-right">
            <a href="{{ route ('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
          </div>
        </li>
      </ul>
    </li>
    <!-- Control Sidebar Toggle Button -->
    
  </ul>
</div>
</nav>
</header>