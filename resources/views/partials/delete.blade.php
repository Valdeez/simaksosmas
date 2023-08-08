<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Yakin ingin menghapus?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/{{ $data['page'] }}/delete/{{ $item->id }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          @if ($data['page'] == 'warta')
            <div>Berita <span class="text-uppercase">{{ $item->judul }}</span> akan dihapus beserta kontennya</div>  
          @else
            <div><span class="text-uppercase">{{ $item->judul }}</span> akan dihapus</div>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button></a>
        </div>
      </form>
    </div>
  </div>
</div>