@extends('layouts.main')

@section('content')
  @include('partials.sidebar')
  <section class="home-section">
    <div class="container">
      <div class="page-title d-flex mt-1 mb-4">
        E-MANAJEMEN ARSIP DATA KESEJAHTERAAN SOSIAL <i class='bx bx-chevron-right mr-1 ml-1'></i> <span>Peta Data Kesejahteraan Sosial</span>
      </div>
      <div class="d-flex">
        <form action="" class="d-flex" id="select">
          <div class="form-group m-0 mr-2">
            <select class="selectpicker" data-style="btn-orange text-white shadow-none" data-width="200px" name="selectBulan" id="selectBulan">
              <option value="" disabled {{ ($data['bulan'] == '') ? 'selected' : '' }}>Pilih bulan</option>
              <option value="01" {{ ($data['bulan'] == '01') ? 'selected' : '' }}>Januari</option>
              <option value="02" {{ ($data['bulan'] == '02') ? 'selected' : '' }}>Februari</option>
              <option value="03" {{ ($data['bulan'] == '03') ? 'selected' : '' }}>Maret</option>
              <option value="04" {{ ($data['bulan'] == '04') ? 'selected' : '' }}>April</option>
              <option value="05" {{ ($data['bulan'] == '05') ? 'selected' : '' }}>Mei</option>
              <option value="06" {{ ($data['bulan'] == '06') ? 'selected' : '' }}>Juni</option>
              <option value="07" {{ ($data['bulan'] == '07') ? 'selected' : '' }}>Juli</option>
              <option value="08" {{ ($data['bulan'] == '08') ? 'selected' : '' }}>Agustus</option>
              <option value="09" {{ ($data['bulan'] == '09') ? 'selected' : '' }}>September</option>
              <option value="10" {{ ($data['bulan'] == '10') ? 'selected' : '' }}>Oktober</option>
              <option value="11" {{ ($data['bulan'] == '11') ? 'selected' : '' }}>November</option>
              <option value="12" {{ ($data['bulan'] == '12') ? 'selected' : '' }}>Desember</option>
            </select>
          </div>
          <div class="form-group m-0 mr-2">
            <select class="selectpicker" data-style="btn-orange text-white shadow-none" data-width="200px" name="selectTahun" id="selectTahun">
              <option value="" disabled {{ ($data['tahun'] == '') ? 'selected' : '' }}>Pilih tahun</option>
              <option value="2023" {{ ($data['tahun'] == '2023') ? 'selected' : '' }}>2023</option>
              <option value="2024" {{ ($data['tahun'] == '2024') ? 'selected' : '' }}>2024</option>
              <option value="2025" {{ ($data['tahun'] == '2025') ? 'selected' : '' }}>2025</option>
            </select>
          </div>
        </form>
        <a 
          @if ($data['tahun'] == '' || $data['database']->count() == 0)
              
          @else
          href="/petadata/download/{{ $data['tahun'] }}/{{ $data['bulan'] }}">
          @endif
          <button type="button" class="btn btn-dark mr-2"><i class="fa-solid fa-download mr-2"></i>Download</button>
        </a>
        @if (session('berhasil'))
          <button type="button" class="btn btn-primary mr-2" data-toggle="{{ ($data['tahun'] != '' && $data['database']->count() > 0) ? '' : 'modal' }}" data-target="#uploadModal"><i class="fa-solid fa-upload mr-2"></i>Upload</button>
          <button type="button" class="btn btn-danger" data-toggle="{{ ($data['tahun'] == '' || $data['database']->count() == 0) ? '' : 'modal' }}" data-target="#deleteModal"><i class="fa-solid fa-trash mr-2"></i>Hapus</button>
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Yakin ingin menghapus?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form action="/{{ $data['page'] }}/delete/{{ $data['tahun'] }}/{{ $data['bulan'] }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                              <span>Semua data pada {{ $data['namaBulan'] }} {{ $data['tahun'] }} akan dihapus</span>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-danger">Hapus</button></a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          @include('partials.upload')
        @endif
      </div>
    </div>
    <div class="container mt-3">
      <div class="d-flex justify-content-between mb-3">
        <div class="align-self-center table-title">
          @if ($data['tahun'] == '')
          Silahkan pilih tahun dan bulan
          @else    
          Menampilkan data pada bulan {{ $data['namaBulan'] }} {{ $data['tahun'] }}
          @endif
        </div>
        <div class="d-flex">
          <label for="searchData" class="align-self-center m-0 mr-2">Cari:</label>
          <input type="text" class="form-control px-2" id="searchData" name="searchData" style="max-height: 30px" {{ ($data['tahun'] == '') ? 'disabled' : '' }}>
        </div>
      </div>
      <table id="datatable" class="table table-striped table-bordered rounded" style="width:100%">  
          <thead class="thead-dark">
              <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Umur</th>
                  <th>Pekerjaan</th>
                  <th>Tahun</th>
                  <th>Bulan</th>
              </tr>
          </thead>
          <tbody id="output">
            @include('partials.datatable')
          </tbody>
      </table>
      {{ $data['database']->links('partials.pagination') }}
    </div>
  </section>
@endsection