@extends('layouts.main')

@section('content')
  <style>
    body{
      overflow: visible;
    }
  </style>
    <div id="section-1">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid mx-5 mt-3 p-0">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-4 mb-2 mb-lg-0">
              <li class="nav-item ml-1 mr-3">
                <a class="nav-link link-light text-dark hover-underline-animation" aria-current="page" href="#section-1" id="beranda">Beranda</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link link-light text-dark hover-underline-animation" href="#section-2" id="fitur">Fitur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link-light text-dark hover-underline-animation" href="#footer" id="kontak">Kontak</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container mx-5 p-0">
        <div class="row d-flex" style="height: 650px;">
          <div class="col-6 mx-5 align-self-center">
            <h1 class="section-1-title">SIMAKSOSMAS</h1>
            <p class="section-1-subtitle">SIMAKSOSMAS merupakan tools dalam proses tata kelola pemerintahan di bidang kesejahteraan sosial. Di dalam tools ini terdapat berbagai macam fitur yang digunakan dalam membantu masyarakat dan berbagai stakeholder lainnya dalam meningkatkan kondisi kesejahteraan sosial masyarakat.</p>
          </div>
        </div>
      </div>
    </div>
    <div id="section-2" style="scroll-margin-top: 70px;">
      <div class="container-sm p-0">
        <div class="row d-flex flex-column">
          <div class="col mt-5">
            <h3 class="text-center"><span class="badge badge-primary bg-orange">Daftar Fitur</span></h3>
            <h2 class="section-2-title mt-3 text-center">Lihat Fitur Yang Kami Sediakan</h2>
          </div>
          <div class="col mt-4 align-self-center">
            <div class="owl-carousel owl-theme">
              <div class="item">
                <div class="card">
                  <div class="row d-flex" style="height: 300px;">
                    <div class="col align-self-center">
                      <div class="d-flex justify-content-center">
                        <div class="circle bg-orange"><i class="fa-solid fa-users fa-4x" style="color: #ffffff;"></i></div>
                      </div>
                      <h5 class="text-center mt-4">E-MANAJEMEN SOSIALISASI DAN INFORMASI KESEJAHTERAAN SOSIAL</h5>
                      <div class="d-flex justify-content-center">
                        <a class="btn btn-dark" href="/modul" role="button">Masuk</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="row d-flex" style="height: 300px;">
                    <div class="col align-self-center">
                      <div class="d-flex justify-content-center">
                        <div class="circle bg-orange"><i class="fa-solid fa-book fa-4x" style="color: #ffffff;"></i></div>
                      </div>
                      <h5 class="text-center mt-4">E-MANAJEMEN KAJIAN ILMIAH KESEJAHTERAAN SOSIAL</h5>
                      <div class="d-flex justify-content-center">
                        <a class="btn btn-dark" href="/kajian/penanggulangan-kemiskinan" role="button">Masuk</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="row d-flex" style="height: 300px;">
                    <div class="col align-self-center">
                      <div class="d-flex justify-content-center">
                        <div class="circle bg-orange"><i class="fa-solid fa-folder-open fa-4x" style="color: #ffffff;"></i></div>
                      </div>
                      <h5 class="text-center mt-4">E-MANAJEMEN ARSIP DATA KESEJAHTERAAN SOSIAL</h5>
                      <div class="d-flex justify-content-center">
                        <a class="btn btn-dark" href="/petadata" role="button">Masuk</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="row d-flex" style="height: 300px;">
                    <div class="col align-self-center">
                      <div class="d-flex justify-content-center">
                        <div class="circle bg-orange"><i class="fa-solid fa-link fa-4x" style="color: #ffffff;"></i></div>
                      </div>
                      <h5 class="text-center mt-4">E-MANAJEMEN INTERVENSI KESEJAHTERAAN SOSIAL</h5>
                      <div class="d-flex justify-content-center">
                        <a class="btn btn-dark" href="/laporan" role="button">Masuk</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="row d-flex" style="height: 300px;">
                    <div class="col align-self-center">
                      <div class="d-flex justify-content-center">
                        <div class="circle bg-orange"><i class="fa-solid fa-box-archive fa-4x" style="color: #ffffff;"></i></div>
                      </div>
                      <h5 class="text-center mt-4">E-MANAJEMEN KONTEN DAN PELAPORAN</h5>
                      <div class="d-flex justify-content-center">
                        <a class="btn btn-dark" href="/warta" role="button">Masuk</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer">
      <div class="container-fluid">
        <div class="d-flex flex-column justify-content-end" style="height: 600px;">
          <div class="row">
            <div class="col mt-5 mb-5">
              <h1 class="footer-title text-center mt-5">SIMAKSOSMAS</h1>
              <div class="d-flex flex-row mt-4 mb-4 justify-content-center">
                <a href="" class="mr-5"><i class="fa-brands fa-twitter fa-lg" style="color: #ffffff;"></i></a>
                <a href="" class="mr-5"><i class="fa-brands fa-facebook-f fa-lg" style="color: #ffffff;"></i></a>
                <a href=""><i class="fa-brands fa-instagram fa-lg" style="color: #ffffff;"></i></a>
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-center mt-5 mb-3 mx-5 px-3">
            <div class="col mt-5">
              <div>
                <p class="p-0 m-0" style="color: #ffffff;">Jl. M.T Haryono No 64. Telp (0283) 4514170 Brebes</p>
              </div>
            </div>
            <div class="col mt-5" style="color: #ffffff;">
              <div class="d-flex align-items-center justify-content-end">
                <div class="flex-shrink-0">
                  <i class="fa-solid fa-envelope fa-lg"></i>
                </div>
                <div class="flex-grow-0 ml-2 text-right">
                  dennymaulana17@gmail.com
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection