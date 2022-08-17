@section('menu')

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            
            <a class="nav-link {{ Request::is('absen') ? 'active' : ''}}" href="/absen">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Statistik Absensi
            </a>


            @can("absensiAdmin")
            <a class="nav-link {{ Request::is('absen_data*') ? 'active' : ''}}" href="/absen_data">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Data Absensi
            </a>
            
            <a class="nav-link {{ Request::is('absen_pengaturan*') ? 'active' : ''}}" href="/absen_pengaturan2">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Pengaturan
            </a>
            @endcan

            @can("absensiHrd")
            <a class="nav-link {{ Request::is('absen_data*') ? 'active' : ''}}" href="/absen_data">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Data Absensi
            </a>
            
            <a class="nav-link {{ Request::is('absen_pengaturan*') ? 'active' : ''}}" href="/absen_pengaturan2">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Pengaturan
            </a>
            @endcan
            
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        
    </div>
</nav>
    
@endsection