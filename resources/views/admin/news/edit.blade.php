@extends('admin.layout')
@section('content')
  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
  <br>
  <div class="content">
    <div class="title_area">
      <h3>Ubah Berita</h3>
    </div>

    <div class="card_content mt-4">

      <div class="scroll">


        <form action="{{ route('dashboard.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">

          @csrf
          @method('PUT')

          <div class="form-group mb-3">
            <label for="title">Judul</label>
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $news->title) }}">
          </div>

          <div class="form-group mb-3">
            <label for="content">Konten</label>
            <textarea id="content" name="content" class="form-control" rows="10" cols="80">{{ old('content', $news->content) }}</textarea>
            <script>
              CKEDITOR.replace('content');
            </script>
          </div>

          <div class="form-group mb-3">
            <label for="slug">Slug</label>
            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $news->slug) }}">
          </div>

            <div class="form-group mb-3">
            <label for="is_published">Status</label>
            <select id="is_published" class="form-control @error('is_published') is-invalid @enderror" name="is_published">
              <option value="1" @if(old('is_published', $news->is_published) == 1) selected @endif>Published</option>
              <option value="0" @if(old('is_published', $news->is_published) == 0) selected @endif>Draft</option>
            </select>
            </div>

            <div class="form-group mb-3">
            <label for="image">Foto</label>
            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            @if ($news->image)
            <p>Foto Saat Ini: <a href="{{ asset('news/' . $news->image) }}" target="_blank">{{ $news->image }}</a></p>
            @endif

          <a class="btn btn-sm btn-secondary" href="{{ route('dashboard.profile_alumni.index') }}"> Kembali</a>
          <button type="submit" class="btn btn-sm btn-primary">Simpan</button>

        </form>

      </div>

    </div>

  </div>
  <script>
    // make slug depend on title
    document.getElementById('title').addEventListener('input', function() {
      document.getElementById('slug').value = this.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    });
  </script>
@endsection
