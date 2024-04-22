@extends('admin.layout')
@section('content')
<br>
<div class="content">
  <div class="title_area">
      <h3><span>Data Profile Alumni</span></h3>
  </div>

<div class="card_content mt-4">

<div class="scroll">

  <a class="btn btn-sm btn-primary" href="{{ route('dashboard.profile_alumni.create') }}"><i class="fas fa-newspaper"></i> Tambah</a>

  @if(session()->has('success'))
    <div class="alert alert-success mt-4">
      {{ session('success') }}
    </div>
  @endif
  <div class="table-responsive">

	<table id="myTable_contoh" class="styled-table">    
		<!----------------------------------------------------------------------->
		<thead>		
				<tr>
          <th>NO</th>
          <th>Nama Lengkap</th>
          <th>Jurusan</th>
          <th>Tahun Lulus</th>
          <th>Profesi</th>
          <th>Gambar</th>
					<th>Aksi </th>
				</tr>
		</thead>
    <tbody>
        @foreach ($data as $item)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->jurusan}}</td>
              <td>{{$item->tahun_lulus }}</td>
              <td>{{$item->profesi }}</td>
              <td>
                <img src="/assets/{{$item->img }}" style="width: 100px;" alt="">
              </td>
              <td>
                <a href="{{ route('dashboard.profile_alumni.edit', $item->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                <a href="{{ route('dashboard.profile_alumni.delete', $item->id) }}" class="btn btn-sm btn-secondary" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    
  </div>

</div>
</div>
</div>
@endsection