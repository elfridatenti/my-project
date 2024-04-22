@extends('alumni.layout')
@section('content')
      <!---->
      <div class="content">
  <div class="title_area">
      <h3> <span>Profile Alumni</span></h3>
  </div>
<br>

<div class="card_content" style="display: flex; justify-content: space-between; align-items: center;">
        <table>
          <tr>
              <td class="label1">Nama Lengkap</td>
              <td>
                {{ $data_diri->nama_lengkap }}
              </td>
          </tr>
          <tr>
              <td class="label1">NIM</td>
              <td>
                {{ $alumni->nim }}
              </td>
          </tr>
          <tr>
              <td class="label1">Tahun Lulus</td>
              <td>
                {{ $alumni->tahun_lulus }}
              </td>
          </tr>
          <tr>
              <td class="label1">Jurusan</td>
              <td>
                {{ $alumni->jurusan }}
              </td>
          </tr>
          <tr>
              <td class="label1">Profesi</td>
              <td>
                {{ $alumni->profesi }}
              </td>
          </tr>
          <tr>
              <td class="label1">Nama Instansi</td>
              <td>
                {{ $alumni->nama_instansi }}
              </td>
          </tr>
          <tr>
              <td class="label1">Alamat Saat Ini</td>
              <td>
                {{ $data_diri->alamat }}
              </td>
          </tr>
        </table>

        <img src="{{ asset('assets/' . $alumni->foto) }}" width="250px" alt="">
</div>
</div>
      
<div class='content'></div>

@endsection