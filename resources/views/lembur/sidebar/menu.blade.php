@section('menu')

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link" href="/lembur">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Lembur
            </a>
            <a class="nav-link" href="/lembur_approve">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Pengajuan Lembur
            </a>

            <a class="nav-link" href="/lembur_approved">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Data Lembur
            </a>


            <a class="nav-link" href="/lembur_settings">
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