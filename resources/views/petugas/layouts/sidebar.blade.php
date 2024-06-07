<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                
                @if (Auth::check() && Auth::user()->role == 'admin')
                <div class="sb-sidenav-menu-heading">Dashboard Admin</div>
                    <a class="nav-link" href="/admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Daftar Kunci-admin
                    </a>

                    <a class="nav-link" href="/sirkulasi">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-rotate-right"></i></div>
                        Sirkulasi-admin
                    </a>

                    <a class="nav-link" href="/karyawan">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Daftar-Karyawan
                    </a>
                    <a class="nav-link" href="/daftarkantor">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Daftar-kantor
                    </a>
                @endif

                @if (Auth::check() && Auth::user()->role == 'satpam')
                <div class="sb-sidenav-menu-heading">Dashboard satpam</div>
                    <a class="nav-link" href="/satpam">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Daftar kunci-satpam
                    </a>

                    <a class="nav-link" href="/sirkulasi_satpam">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-rotate-right"></i></div>
                        Sirkulasi-satpam
                    </a>
                    
                @endif
{{-- 
                

                

                @if (Auth::check() && Auth::user()->role == 'admin')
                    
                @endif --}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small"></div>

        </div>
    </nav>
</div>
