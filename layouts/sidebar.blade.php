<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/AdminLTE-2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li><a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MASTER</li>
        <li><a href="{{ url('attendances') }}"><i class="menu-icon fa fa-check-square"></i> <span>Attendances</span></a></li>
        <li><a href="{{ url('warnings') }}"><i class="menu-icon fa fa-warning"></i> <span>Warnings (SP)</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Input Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('employees') }}"><i class="menu-icon fa fa-users"></i> Employees</a></li>
            <li><a href="{{ url('units') }}"><i class="menu-icon fa fa-truck"></i> Units</a></li>
            <li><a href="{{ url('unit_models') }}"><i class="menu-icon fa fa-th-large"></i> Unit Models</a></li>
            <li><a href="{{ url('unit_premis') }}"><i class="menu-icon fa fa-rub"></i>Unit Premis</a></li>
            <li><a href="{{ url('plant_units') }}"><i class="menu-icon fa fa-flag"></i>Plant Units</a></li>
            <li><a href="{{ url('projects') }}"><i class="menu-icon fa fa-building"></i>Projects</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('attendance_categories') }}"><i class="menu-icon fa fa-tags"></i>Attendance
              Categories</a></li>
            <li><a href="{{ url('load_categories') }}"><i class="menu-icon fa fa-tags"></i> Load
              Categories</a></li>
            <li><a href="{{ url('warning_categories') }}"><i class="menu-icon fa fa-tags"></i> Warning
              Categories</a></li>
            
          </ul>
        </li>
        
        
        
       
       
        
        <li><a href="{{ url('prod_parameters') }}"><i class="menu-icon fa fa-product-hunt"></i> <span>Production Parameters</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('productions') }}"><i class="menu-icon fa fa-shopping-cart"></i>Premi Produksi</a></li>
            <li><a href="{{ url('supports') }}"><i class="menu-icon fa fa-shopping-cart"></i>Premi Support</a></li>
            <li><a href="{{ url('premirekaps') }}"><i class="menu-icon fa fa-shopping-cart"></i>Rekap Premi</a></li>
            
          </ul>
        </li>
        <li class="header">Users</li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Users</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
