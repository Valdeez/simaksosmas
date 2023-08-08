@extends('layouts.main')

@section('content')
    @include('partials.sidebar')
    <?php $item = $data['database'] ?>
    <section class="home-section">
        <div class="container">
            <div class="page-title d-flex mt-1 mb-4">
                E-MANAJEMEN KONTEN DAN PELAPORAN <i class='bx bx-chevron-right mr-1 ml-1'></i> <span>Warta Kesejahteraan Sosial</span>
            </div>
        </div>
        <div class="container d-flex">
            <div class="news col mr-3" id="news">
                <div class="news-head">
                    <div class="news-title text-uppercase">
                        <div>{{ $item->judul }}</div>
                    </div>
                    <div class="divider bg-dark"></div>
                    <div class="news-img mt-3 mb-3">
                        <img src="{{ asset('storage/warta/'.$item->dokumen) }}" alt="">
                        <div class="detail d-flex justify-content-between mt-2">
                            <div class="text-secondary">
                                {{ $item->sumber }}
                            </div>
                            <div class="text-secondary">
                                {{ $item->created_at->translatedFormat('l, d F Y') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-body">
                    <div class="news-content mb-1">
                        {!! nl2br(e($item->isi)) !!}
                    </div>
                </div>
            </div>
            <div class="other-news col-3">
                <div class="more-news">
                    <div class="other-head">
                        Baca Juga
                    </div>
                    <div class="other-body">
                        @foreach ($data['other'] as $index => $other)    
                        <div class="other-list">
                            <a href="/warta/{{ $other->id }}">
                                <div class="other-content">
                                    <div class="number align-self-center">{{ $index + 1 }}.</div>
                                    <div class="text crop-text-2">
                                        {{ $other->judul }}
                                    </div>
                                </div>
                            </a>
                            <hr>
                        </div>
                        @endforeach
                        <div class="col p-0">
                            <a href="/warta">
                                <button type="button" class="btn btn-secondary w-100"><i class="fa-solid fa-angle-left mr-2"></i>Kembali</button>
                            </a>
                        </div>
                        @if (session('berhasil'))    
                            <div class="d-flex justify-content-between mt-2">
                                <div class="col p-0 mr-1">
                                    <button type="button" class="btn btn-warning text-white w-100" data-toggle="modal" data-target="#editModal{{ $item->id }}"><i class="fa-solid fa-pen mr-2"></i>Edit</button>
                                </div>
                                <div class="col p-0 ml-1">
                                    <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i class="fa-solid fa-trash mr-2"></i>Hapus</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @include('partials.edit')
                @include('partials.delete')
            </div>
        </div>
    </section>
@endsection