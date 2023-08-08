<div class="sidebar">
    <div class="logo-details mt-1">
        <div class="logo_name">SIMAKSOSMAS</div>
    </div>
    <ul class="nav-links">
        <li class="dropdown {{ ($data['page'] == 'modul') ? 'active' : '' }}">
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-group'></i>
                    <span class="link_name">E-SOSIALISASI</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">E-MANAJEMEN SOSIALISASI DAN INFORMASI KESEJAHTERAAN SOSIAL</a></li>
                <li><a href="/modul">MODUL SOSIALISASI</a></li>
                <li><a href="https://www.youtube.com/watch?v=68074vOQX5k&t=21s&pp=ygUNZGluc29zIGJyZWJlcw%3D%3D" target="_blank">SOSIALISASI DAN INFORMASI</a></li>
                <li><a href="/faq">FAQ</a></li>
            </ul>
        </li>
        <li class="dropdown {{ ($data['page'] == 'kajian') ? 'active' : '' }}">
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book' ></i>
                    <span class="link_name">E-KAJIAN</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">E-MANAJEMEN KAJIAN ILMIAH KESEJAHTERAAN SOSIAL</a></li>
                <li><a href="/kajian/penanggulangan-kemiskinan">PENGELOLAAN DATA DAN PENANGGULANGAN KEMISKINAN</a></li>
                <li><a href="/kajian/jaminan-sosial">PENGELOLAAN DATA DAN JAMINAN SOSIAL</a></li>
                <li><a href="/kajian/pemberdayaan-sosial">PENGELOLAAN DATA DAN PEMBERDAYAAN SOSIAL</a></li>
                <li><a href="/kajian/rehabilitasi-sosial">PENGELOLAAN DATA DAN REHABILITASI SOSIAL</a></li>
                <li><a href="/kajian/perlindungan-sosial">PENGELOLAAN DATA DAN PERLINDUNGAN SOSIAL</a></li>
            </ul>
        </li>
        <li class="dropdown {{ ($data['page'] == 'arsipdata' || $data['page'] == 'petadata') ? 'active' : '' }}">
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="link_name">E-ARSIP DATA</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">E-MANAJEMEN ARSIP DATA KESEJAHTERAAN SOSIAL</a></li>
                <li><a href="#">DATA DAN INTERVENSI KESEJAHTERAAN SOSIAL</a></li>
                <li><a href="/petadata">PETA DATA KESEJAHTERAAN SOSIAL</a></li>
                <li><a href="/sinkronisasi">SINKRONISASI INTERNAL</a></li>
            </ul>
        </li>
        <li class="dropdown {{ ($data['page'] == 'laporan') ? 'active' : '' }}">
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-link-alt' ></i>
                    <span class="link_name">E-INTERVENSI</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">E-MANAJEMEN INTERVENSI KESEJAHTERAAN SOSIAL</a></li>
                <li><a href="http://bit.ly/formrapidasesmendanintervensidinsoskabbrebes" target="_blank">RAPID ASESMEN KESEJAHTERAAN SOSIAL</a></li>
                <li><a href="/laporan">LAPORAN INTERVENSI</a></li>
            </ul>
        </li>
        <li class="dropdown {{ ($data['page'] == 'warta') ? 'active' : '' }}">
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-collection' ></i>
                    <span class="link_name">E-KONTEN</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">E-MANAJEMEN KONTEN DAN PELAPORAN</a></li>
                <li><a href="/warta">WARTA KESEJAHTERAAN SOSIAL</a></li>
                <li><a href="#">ASPIRASI DAN TINDAK LANJUT KESEJAHTERAAN SOSIAL MASYARAKAT</a></li>
            </ul>
        </li>
        @if (session('berhasil'))    
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <div class="img"></div>
                </div>
                <div class="name-job">
                    <div class="profile_name">{{ session('username') }}</div>
                    <div class="job">Administator</div>
                </div>
                <a href="/logout">
                    <i class='bx bx-log-out'></i>
                </a>
            </div>
        </li>
        @endif
    </ul>
</div>