@extends('layouts.main')

@section('content')
    @include('partials.sidebar')
    <section class="home-section">
        <div class="container">
            <div class="page-title d-flex mt-1 mb-4">
                E-MANAJEMEN KONTEN DAN PELAPORAN <i class='bx bx-chevron-right mr-1 ml-1'></i> <span>Warta Kesejahteraan Sosial</span>
            </div>
            <div class="search-bar mb-3 d-flex">
                <div class="input-group mr-2">
                    <input type="text" name="searchWarta" id="searchWarta" class="form-control shadow-none" placeholder="cari berita..." aria-describedby="button-addon2">
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
            <div class="news-list">
                <div class="row row-cols-1 row-cols-md-2" id="news-list">
                    @include('partials.news')
                </div>
            </div>
        </div>
    </section>
@endsection