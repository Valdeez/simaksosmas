<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog {{ ($data['page'] == 'warta') ? 'modal-xl' : 'modal-lg' }}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">
          @if ($data['page'] == 'petadata')
              Upload data
          @else
              Upload {{ $data['page'] }}
          @endif
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="upload" action="/{{ $data['page'] }}/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          @if ($data['page'] == 'petadata')
            <div class="form-group d-flex">
              <div class="col pl-0 pr-2">
                <label for="selectBulan">Bulan</label>
                <select class="form-control" id="selectBulan" name="bulan" required>
                  <option value="" disabled selected>Pilih bulan</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
              <div class="col pr-0 pl-2">
                <label for="selectTahun">Tahun</label>
                <select class="form-control" id="selectTahun" name="tahun" required>
                  <option value="" disabled selected>Pilih tahun</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                </select>
              </div>
            </div>
          @elseif ($data['page'] == 'warta')
            <div class="form-group">
                <label for="exampleFormControlInput1">Judul warta</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="masukkan judul..." required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Isi warta</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="8" placeholder="masukkan isi..." required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Sumber gambar</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="sumber" placeholder="masukkan sumber...">
            </div>
          @else
            <div class="form-group">
                <label for="exampleFormControlInput1">Judul {{ $data['page'] }}</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="masukkan judul..." required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Deskripsi {{ $data['page'] }}</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3" placeholder="masukkan deskripsi..."></textarea>
            </div>
            @if ($data['page'] == 'kajian')
                <div class="form-group">
                    <label for="selectKategori">Kategori {{ $data['page'] }}</label>
                    <select class="form-control" id="selectKategori" name="kategori" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        <option value="penanggulangan-kemiskinan">Pengelolaan Data dan Penanggulangan Kemiskinan</option>
                        <option value="jaminan-sosial">Pengelolaan Data dan Jaminan Sosial</option>
                        <option value="pemberdayaan-sosial">Pengelolaan Data dan Pemberdayaan Sosial</option>
                        <option value="rehabilitasi-sosial">Pengelolaan Data dan Rehabilitasi Sosial</option>
                        <option value="perlindungan-sosial">Pengelolaan Data dan Perlindungan Sosial</option>
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
                        <input type="file" class="form-control-file" id="fileInputUpload" onchange="fileUpload()" style="color: transparent;" name="dokumen" required>
                    </div>
                    <div class="col p-0">
                        <label id="fileLabelUpload" for="fileInputUpload">No file chosen</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Upload</button></a>
        </div>
      </form>
    </div>
  </div>
</div>