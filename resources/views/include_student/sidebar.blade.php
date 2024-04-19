<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/schools/'.Auth::user()->pic)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @if(Auth::user())
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          @else
          <a href="#" class="d-block">Student dashboard</a>
          @endif       
         </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
           
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
                      <p>
                      Dashboard
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
          <p><i class="fas fa-file" style="margin-right: 5px;"></i>
               Appointments
               
              </p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
          <p><i class="fas fa-file-prescription" style="margin-right: 5px;"></i>
             payments
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
          <p><i class="fas fa-file-prescription" style="margin-right: 5px;"></i>
              exams
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
          <p><i class="fas fa-flask" style="margin-right: 5px;"></i>
             Events
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
          <p><i class="fas fa-file-prescription" style="margin-right: 5px;"></i>
               Holidays
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
          <p><i class="fas fa-file-prescription" style="margin-right: 5px;"></i>
               SMS & notice
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
          <p><i class="fas fa-cog" style="margin-right: 5px;"></i>
                Settings
               
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>