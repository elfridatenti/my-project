@extends('admin.layout')
@section('content')
  <br>
  <div class="content">
    <div class="title_area">
      <h3>Data Berita</h3>
    </div>

    <div class="card_content mt-4">

      <div class="scroll">

        <a class="btn btn-sm btn-primary" href="{{ route('dashboard.news.create') }}"><i class="fa fa-plus"></i> Tambah</a>

        @if (session()->has('success'))
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
                <th>Judul</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Aksi </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($news as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->title }}</td>
                  <td><img src="{{ asset('storage/news/' . $item->image) }}" alt="" style="width: 100px"></td>
                  <td>{{ $item->is_published == 1 ? 'Published' : 'Draft' }}</td>
                  <td>
                    <a href="{{ route('dashboard.news.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                        class="fas fa-edit"></i></a>
                    <form action="{{ route('dashboard.news.destroy', $item->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i
                          class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center">Belum ada data</td>
                </tr>
              @endforelse
            </tbody>
          </table>

        </div>

      </div>
    </div>
  </div>
@endsection
