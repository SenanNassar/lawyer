
@include('admin.layout.admin-header')
@include('admin.layout.admin-footer')


    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                 <!-- Notifications Dropdown Menu -->


    </ul>
  </nav>
  <!-- /.navbar -->


        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
        <a href="{{ Route('SiteIndex') }} " class="brand-link">
                <img src="{{ asset('dist/img/Logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">مكتب الظفيري </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 pr-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user_512x512.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ Route('admin.index') }}" class="d-block">صفحة الادارة</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ Route('admin.consRequst.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-id-card-alt"></i>
                                <p>

                                 طلبات الاستشارة
                                    {{-- <span class="right badge badge-danger">الاتصال</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ Route('admin.employee.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                   ادارة الموظفين

                                </p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview">
                        <a href="{{Route('admin.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    ادارة الموقع



                                </p>
                            </a>

                        </li>
                        <li class="nav-item p-2" style="list-style: none; font-size:20px; border-top:#4f5962 solid 1px">

                            {{-- logout lable --}}
                            <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                <i class="nav-icon far fa-circle text-danger float-left"></i><p class="text float-left pr-2">خروج
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                            </a>

                             {{-- End logout lable --}}

                        </li>
                    </ul>




                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
     <div class="container w-100" style="direction: rtl;">
          @yield('main_content')
     </div>


        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    <footer class="main-footer" style="direction: rtl; text-align:center">
        <strong>جميع الحقوق محفوظة &copy; {{date('yy')}} <a href="https://aldhafeerigroup.com/">aldhafeerigroup</a></strong>
      مكتب الظفيري للمحاماة.
        <div class="float-right d-none d-sm-inline-block">
            <b></b>
        </div>
    </footer>



