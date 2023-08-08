@extends('layouts.main')

@section('content')
  @include('partials.sidebar')
  <section class="home-section">
    <div class="container">
      <div class="page-title d-flex mt-1 mb-4">
        E-MANAJEMEN SOSIALISASI DAN INFORMASI KESEJAHTERAAN SOSIAL <i class='bx bx-chevron-right mr-1 ml-1'></i> <span>Modul Sosialisasi</span>
      </div>
      <div class="search-bar mb-3 d-flex">
        <div class="input-group mr-2">
          <input type="text" name="searchModul" id="searchModul" class="form-control shadow-none" placeholder="cari modul..." aria-label="cari modul..." aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-orange text-white" type="button" id="button-addon2"><i class="fa-solid fa-search"></i></button>
          </div>
        </div>
        @if (session('berhasil'))
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal"><i class="fa-solid fa-plus"></i></button>
          @include('partials.upload')
        @endif
      </div>
    </div>
    <div class="container">
      <div class="list-wrapper">
        @include('partials.list')
      </div>
    </div>
  </section>
@endsection