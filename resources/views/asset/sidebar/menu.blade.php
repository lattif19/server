@section('menu')

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="/kendaraan">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link" href="/kendaraan/mobil">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Kendaraan
            </a>

            <a class="nav-link" href="/kendaraan/service">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Perbaikan
            </a>

            <a class="nav-link" href="/kendaraan/asuransi">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Asuransi
            </a>

            <a class="nav-link" href="/kendaraan/setting">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Pengaturan
            </a>

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
    
@endsection