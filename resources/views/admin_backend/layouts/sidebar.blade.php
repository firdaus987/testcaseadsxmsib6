  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      
      <li class="nav-item">
        <a id="sidebar-dashboard" class="nav-link collapsed" href="{{ route('adminDashboard.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

 

        <li class="nav-item">
          <a id="sidebar-listperson" class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="/admin">
            <i class="bi bi-person"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a id="sidebar-item-listuser" href="/listuser">
                <i class="bi bi-circle"></i><span>List Karyawan</span>
              </a>
            </li>
            <?php $user = Auth::user(); 
            if ($user->kelas_user ==1) { ?>
              {{-- <li>
              <a id="sidebar-item-listadmin" href="/listadmin">
                <i class="bi bi-circle"></i><span>List Cuti</span>
              </a>
            </li> --}}
          <?php } ?>
            <!-- <li>
              <a id="sidebar-item-listadmin" href="/listadmin">
                <i class="bi bi-circle"></i><span>List Admin</span>
              </a>
            </li> -->
          </ul>
        </li><!-- End User Nav --> 


        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="bi bi-box-arrow-in-right"></i>
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </li><!-- End Logout Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
