<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog {{ ($data['page'] == 'warta') ? 'modal-xl' : 'modal-lg' }}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit {{ $data['page'] }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit" action="/{{ $data['page'] }}/edit/{{ $item->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          @if ($data['page'] == 'warta')
            <div class="form-group">
                <label for="exampleFormControlInput1">Judul warta</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" value="{{ $item->judul }}" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Isi warta</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="8" required>{{ $item->isi }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Sumber gambar</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="sumber" value="{{ $item->sumber }}">
            </div>
          @else    
            <div class="form-group">
                <label for="exampleFormControlInput1">Judul {{ $data['page'] }}</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" value="{{ $item->judul }}" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Deskripsi {{ $data['page'] }}</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3">{{ $item->deskripsi }}</textarea>
            </div>
            @if ($data['page'] == 'kajian')    
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Kategori {{ $data['page'] }}</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="kategori" required>
                      <option value="" disabled>Pilih kategori</option>
                      <option value="penanggulangan-kemiskinan" {{ ($item->kategori == 'penanggulangan-kemiskinan') ? 'selected' : '' }}>Pengelolaan Data dan Penanggulangan Kemiskinan</option>
                      <option value="jaminan-sosial" {{ ($item->kategori == 'jaminan-sosial') ? 'selected' : '' }}>Pengelolaan Data dan Jaminan Sosial</option>
                      <option value="pemberdayaan-sosial" {{ ($item->kategori == 'pemberdayaan-sosial') ? 'selected' : '' }}>Pengelolaan Data dan Pemberdayaan Sosial</option>
                      <option value="rehabilitasi-sosial" {{ ($item->kategori == 'rehabilitasi-sosial') ? 'selected' : '' }}>Pengelolaan Data dan Rehabilitasi Sosial</option>
                      <option value="perlindungan-sosial" {{ ($item->kategori == 'perlindungan-sosial') ? 'selected' : '' }}>Pengelolaan Data dan Perlindungan Sosial</option>
                  </select>
              </div>
            @endif
          @endif
            <div class="form-group">
                @if ($data['page'] == 'warta')
                  <label>File gambar</label>
                @else
                  <label>File {{ $data['page'] }}</label>
                @endif
                <div class="d-flex justify-content-right">
                    <div class="col-2 p-0">
                        <input type="file" class="form-control-file" id="fileInputEdit" onchange="fileEdit()" style="color: transparent;" name="dokumen">
                    </div>
                    <div class="col p-0">
                        <label id="fileLabelEdit" for="fileInputEdit">{{ Str::substr($item->dokumen, 6) }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning btn-orange text-white">Edit</button></a>
        </div>
      </form>
    </div>
  </div>
</div>