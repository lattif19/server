@section('menu')

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">



            <div class="sb-sidenav-menu-heading">Menu</div>

            <a class="nav-link {{ Request::is('pegawai*') ? 'active' : ''}}" href="/pegawai">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Pegawai
            </a>



            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#organisasi" aria-expanded="false" aria-controls="organisasi">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Organisasi
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse
            {{ Request::is('jabatan*') ? 'show' : ''}}
            {{ Request::is('divisi*') ? 'show' : ''}}
            " id="organisasi" aria-labelledby="headingOne" 
                data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::is('divisi*') ? 'active' : ''}}" href="/divisi">Devisi</a>
                    <a class="nav-link {{ Request::is('jabatan*') ? 'active' : ''}}" href="/jabatan">Jabatan</a>
                </nav>
            </div>


            <a class="nav-link {{ Request::is('hak_akses*') ? 'active' : ''}}" href="/hak_akses">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Hak Akses
            </a>

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="fa fa-address-card"></div>
        {{ DB::table("pegawai")->where("user_id", auth()->user()->id)->get()[0]->nama }}
    </div>
</nav>
    
@endsection