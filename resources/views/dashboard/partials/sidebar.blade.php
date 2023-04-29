        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-text mx-3">Sistem Antrian Online</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Antrian
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/antrian">
                    <i class="bi bi-list-columns-reverse"></i>
                    <span>Antrian</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Antrian Masuk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Berdasarkan Layanan </h6>
                        @foreach ($antrians as $antrian)
                            <a class="collapse-item" href="/dashboard/antrian-masuk/{{ $antrian->slug }}">{{ $antrian->nama_layanan }}</a>
                        @endforeach   
                    </div>
                </div>
            </li>
            <br>


            <div class="sidebar-heading">
                Data Master
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/layanan">
                    <i class="bi bi-headset"></i>
                    <span>Layanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->