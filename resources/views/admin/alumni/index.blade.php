@extends('admin.layout')
@section('content')
<br>
<div class="content">
  <div class="title_area">
      <h3><span>Data alumni</span></h3>
</div>

<?php 
	///include 'message.php';
?>

<br><br><br>

<div class="card_content">
	{{-- <a href="/alumni/alumni-form" class="btn_tambah"><i class="fas fa-newspaper"></i> Tambah Data</a> --}}
	
	<div>
	<div class="search-box ">
    <form action="" method="get">
      <div class="input-group ">
        <button class="input-group-text">Search</button>
		    <input type="text" name="keyword" id="keyword" onkeyup="myFunction()" class="form-control" placeholder="Search for names..">
      <div>
      </form>
  </div>
  </div>

<div class="scroll">
  <div class="table-responsive">
    
	<table id="myTable_contoh" class="styled-table">    
		<!----------------------------------------------------------------------->
		<thead>		
				<tr>
          <th>NO</th>
          <th>Nama Lengkap</th>
          <th>No. KTP</th>
          <th>No. Telp</th>
          <th>Email</th>
          <th>Ibu Kandung</th>
          <th>Jenis Kelamin</th>
					<th>TTL</th>
          <th>Alamat</th>
          <th>NIM</th>
          <th>Angkatan</th>
          <th>Tahun Lulus</th>
          <th>Jurusan</th>
          <th>Profesi</th>
          <th>Nama Instansi</th>
          <th>Alamat Instansi </th>
          <th>Kota </th>
          <th>Ijazah </th>
          <th>KTP </th>
					<th>Foto </th>

				</tr>
		</thead>
    <tbody>
        @foreach ($data as $item)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->datadiri->nama_lengkap}}</td>
              <td>{{$item->datadiri->no_ktp}}</td>
              <td>{{$item->datadiri->no_telp}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->datadiri->ibu_kandung}}</td>
              <td>{{$item->datadiri->jk}}</td>
              <td>{{$item->datadiri->tempat_lahir}}, {{$item->datadiri->tanggal_lahir}}</td>
              <td>{{$item->datadiri->alamat}}</td>
              <td>{{$item->alumni->nim}}</td>
              <td>{{$item->alumni->angkatan }}</td>
              <td>{{$item->alumni->tahun_lulus }}</td>
              <td>{{$item->alumni->jurusan }}</td>
              <td>{{$item->alumni->profesi }}</td>
              <td>{{$item->alumni->nama_instansi }}</td>
              <td>{{$item->alumni->alamat }}</td>
              <td>{{$item->alumni->kota }}</td>
              <td>
                <a href="/assets/{{$item->alumni->ijazah}}" class="btn_edit">Download</a>
              </td>
              <td>
                <a href="/assets/{{$item->alumni->ktp}}" class="btn_edit">Download</a>
              </td>
              <td>
                <a href="/assets/{{$item->alumni->foto}}" class="btn_edit">Download</a>
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