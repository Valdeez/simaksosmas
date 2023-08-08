@foreach ($data['database'] as $item)    
    <div class="list-card mb-3">
        <div class="col">
            <div class="title mb-2 text-uppercase">
                {{ $item->judul }}
            </div>
            <div class="description">
                {{ $item->deskripsi }}
            </div>
            <div class="detail mt-2">
                <div class="col-auto p-0">
                    @if ($data['page'] == 'kajian')
                        Kategori: {{ $data['title'] }} |
                    @endif
                    Tipe: {{ $item->tipe }} | Tanggal upload: {{ $item->created_at->format('d-m-Y') }}
                </div>
                <div class="col p-0 action">
                    @if (session('berhasil'))
                        <a href="" type="button" data-toggle="modal" data-target="#editModal{{ $item->id }}" class="mr-2"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                        <button type="button" class="btn shadow-none btn-outline-danger mr-2" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">Hapus</button>
                    @endif
                    <a href="/{{ $data['page'] }}/download/{{ $item->id }}">
                        <button type="button" class="btn btn-dark">Download</button>
                    </a>
                </div>
          </div>
        </div>
        @if (session('berhasil'))    
            @include('partials.edit')
            @include('partials.delete')
        @endif
    </div>
@endforeach