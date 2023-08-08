@if ($data['database']->count() == 0)
    <tr>
      <td colspan="100%" class="text-center">Data tidak ditemukan</td>
    </tr>
@else    
  @foreach ($data['database'] as $index => $item)
  <tr>
      <td>{{ $index + $data['database']->firstItem() }}</td>
      {{-- <td>#</td> --}}
      <td>{{ $item->nama }}</td>
      <td>{{ $item->umur }}</td>
      <td>{{ $item->pekerjaan }}</td>
      <td>{{ $item->tahun }}</td>
      <td>{{ $item->bulan }}</td>
  </tr>
  @endforeach
@endif