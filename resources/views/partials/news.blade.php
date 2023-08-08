@foreach ($data['database'] as $item)    
    <div class="col">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset('storage/warta/'.$item->dokumen) }}" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-truncate">{{ $item->judul }}</h5>
                        <p class="card-text crop-text" style="min-height: 72px;">{{ $item->isi }}</p>
                        <div class="d-flex justify-content-between">
                            <p class="text-secondary m-0">{{ $item->created_at->format('d-m-Y') }}</p>
                            <p class="card-text text-right">
                                <small><a href="/warta/{{ $item->id }}">Lihat selengkapnya<i class="fa-solid fa-angle-right ml-1"></i></a></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach