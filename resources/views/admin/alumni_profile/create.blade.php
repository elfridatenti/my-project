@extends('admin.layout')
@section('content')

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<br>
<div class="content">
  <div class="title_area">
      <h3><span>Tambah Profile Alumni</span></h3>
  </div>

  <div class="card_content mt-4">

    <div class="scroll">


      <form action="{{ route('dashboard.profile_alumni.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
          <label for="">Nama Alumni</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
        </div>

        <div class="form-group mb-3">
          <label for="">Jurusan</label>
          <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}">
        </div>

        <div class="form-group mb-3">
          <label for="">Tahun Lulus</label>
          <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror" name="tahun_lulus" value="{{ old('tahun_lulus') }}">
        </div>

        <div class="form-group mb-3">
          <label for="">Profesi</label>
          <input type="text" class="form-control @error('profesi') is-invalid @enderror" name="profesi" value="{{ old('profesi') }}">
        </div>

        <div class="form-group mb-3">
          <label for="">Desk</label>
          <textarea name="desk" class="form-control" id="desk" rows="10" cols="80">{{ old('desk') }}</textarea>
            <script>
                CKEDITOR.replace( 'desk' );
            </script>
        </div>

        <div class="form-group mb-3">
          <label for="">Foto</label>
          <input type="file" class="form-control @error('img') is-invalid @enderror" name="img">
        </div>

      <a class="btn btn-sm btn-secondary" href="{{ route('dashboard.profile_alumni.index') }}"> Kembali</a>
      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>

      </form>

    </div>

  </div>

</div>
@endsection