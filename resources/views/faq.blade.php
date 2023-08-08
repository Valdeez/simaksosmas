@extends('layouts.main')

@section('content')
    @include('partials.sidebar')
    <section class="home-section">
        <div class="container">
            <div class="page-title d-flex mt-1 mb-4">
                E-MANAJEMEN SOSIALISASI DAN INFORMASI KESEJAHTERAAN SOSIAL <i class='bx bx-chevron-right mr-1 ml-1'></i> <span>FAQ</span>
            </div>
        </div>
        <div class="container d-flex">
            <div class="col p-0">
                <div class="accordion mb-3 pt-3">
                    <h5 class="mb-1">KATEGORI {{ $data['kategori-1'] }}</h5>
                    @foreach ($faqDB->where('kategori', $data['kategori-1']) as $kategori1)    
                    <div class="accordion-item">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">{{ $kategori1->pertanyaan }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>{{ $kategori1->jawaban }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="accordion mb-3 pt-3">
                    <h5 class="mb-1">KATEGORI {{ $data['kategori-2'] }}</h5>
                    @foreach ($faqDB->where('kategori', $data['kategori-2']) as $kategori2)    
                    <div class="accordion-item">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">{{ $kategori2->pertanyaan }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>{{ $kategori2->jawaban }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="accordion mb-3 pt-3">
                    <h5 class="mb-1">KATEGORI {{ $data['kategori-3'] }}</h5>
                    @foreach ($faqDB->where('kategori', $data['kategori-3']) as $kategori3)    
                    <div class="accordion-item">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">{{ $kategori3->pertanyaan }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>{{ $kategori3->jawaban }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="accordion mb-3 pt-3">
                    <h5 class="mb-1">KATEGORI {{ $data['kategori-4'] }}</h5>
                    @foreach ($faqDB->where('kategori', $data['kategori-4']) as $kategori4)    
                    <div class="accordion-item">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">{{ $kategori4->pertanyaan }}</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>{{ $kategori4->jawaban }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-4 p-0 ml-3">
                <div class="more-info">
                    <div class="text">
                        Pertanyaan lebih lanjut dapat hubungi
                    </div>
                    <div class="divider"></div>
                    <div class="contact">
                        <div class="mb-2"><i class='bx bx-envelope'></i>customerservice@gmail.com</div>
                        <div class=""><i class='bx bx-phone'></i>+62-886-4142-3681</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection