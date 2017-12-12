<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">


      <li class="treeview">
        @if(auth()->user()->id_role==1)
        <a href="#">
          <i class="glyphicon glyphicon-user"></i> <span>Pegawai</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('users.index')}}"><i class="fa fa-circle-o text-aqua"></i> Manajemen Pegawai</a></li>   
        </ul>
      </li>
      @endif

      <li class="treeview">
        @if(auth()->user()->id_role==2)
        <a href="#">
          <i class="glyphicon glyphicon-user"></i> <span>Pegawai</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">    
          <li><a href="{{ route('dataUser')}}"><i class="fa fa-circle-o text-aqua"></i> Data Pegawai</a></li>
        </ul>
      </li>
      @endif

      <li class="treeview">
        @if(auth()->user()->id_role==1)
        <a href="#">
          <i class="glyphicon glyphicon-king"></i> <span> Direktorat </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('direktorat.index')}}"><i class="fa fa-circle-o text-aqua"></i> Manajemen Direktorat</a></li>
        </ul>
      </li>
      @endif

      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-book"></i> <span> SOP </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        @if(auth()->user()->id_role==1)
        <ul class="treeview-menu">
          <li><a href="{{ route('sop.index')}}"><i class="fa fa-circle-o text-aqua"></i> Manajemen SOP</a></li>
        </ul>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Manajemen Revisi</a></li>
        </ul>
        @endif
      </li>
      
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-star-empty"></i> <span> Knowledge </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        @if(auth()->user()->id_role==1)
        <ul class="treeview-menu">
          <li><a href="{{ route('knowledge.index')}}"><i class="fa fa-circle-o text-aqua"></i> Manajemen Knowledge</a></li>
        </ul>
        @endif

        @if(auth()->user()->id_role==2)
        <ul class="treeview-menu">
          <li><a href="{{ route('tambahKnowledge')}}"><i class="fa fa-circle-o text-red"></i> Tambah Knowledge</a></li>
          <li><a href="{{ route('dataKnowledge')}}"><i class="fa fa-circle-o text-aqua"></i> Manajemen Knowledge</a></li>
        </ul>
        @endif
      </li>

       @if(auth()->user()->id_role== 1)
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-pencil"></i> <span> Notulensi </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('notulensi.index')}}"><i class="fa fa-circle-o text-aqua"></i> Tabel Informasi</a></li>
          <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> Performa</a></li> -->
        </ul>
      </li>
      @endif

      @if(auth()->user()->id_role== 2)
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-pencil"></i> <span> Notulensi </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('notulensi.index')}}"><i class="fa fa-circle-o text-aqua"></i> Tabel Informasi</a></li>     
        </ul>
      </li>
      @endif
<!-- 
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-globe"></i> <span> Stream </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('beranda')}}"><i class="fa fa-circle-o text-aqua"></i> Beranda</a></li>
        </ul>
      </li> -->

      <!-- <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-question-sign"></i> <span> FAQ </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li> -->

      <li class="treeview">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="glyphicon glyphicon-log-out"></i> <span> Logout </span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>