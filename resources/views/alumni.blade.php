<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="images/logo.png">
  <title>Data Alumni</title>
    <link rel="icon web" href="Logo.png" class="responsive">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style> 
      select {
        height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid rgb(172, 166, 166);
  font-size: 16px;
  transition: all 0.3s ease;
      }
    </style>
  </head>

  <body style="overflow: auto; background-attachment: fixed;">      
    <div class="container" style="max-width: 613px;">
      <div class="wrapper">
        <div class="title">
            <img src="/images/Logo.png" alt="Image" height="80" width="80">
            <td>Data Alumni</td>
        </div>
        <form action="{{ route('save_data_alumni') }}" method="post" enctype="multipart/form-data"> 
         @csrf
          <div class="row">
            <td>NIM</td>
            <i class="fas fa-user"></i>
            <input name="nim" type="number" placeholder="NIM" required>
          </div>
          <div class="space"></div>

           <div class="row">
            <td>Angkatan</td>
            <i class="fas fa-user"></i>
            <input name="angkatan" type="number" placeholder="Angkatan"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Tahun Lulus</td>
            <i class="fas fa-user"></i>
            <input name="tahun_lulus" type="number" placeholder="Tahun Lulus"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Jurusan</td>
            <i class="fas fa-user"></i>
            <input name="jurusan" type="text" placeholder="Jurusan" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Profesi</td>
            <i class="fas fa-user"></i>
            <input name="profesi" type="text" placeholder="Profesi" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Nama Instansi</td>
            <i class="fas fa-user"></i>
            <input name="nama_instansi" type="text" placeholder="Nama Instansi" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Alamat Instansi</td>
            <i class="fas fa-user"></i>
            <input name="alamat" type="text" placeholder="Alamat Instansi" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Kota</td>
            <i class="fas fa-user"></i>
            <input name="kota" type="text" placeholder="Kota" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Ijazah</td>
            <i class="fas fa-user"></i>
            <input name="ijazah" type="file" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>KTP</td>
            <i class="fas fa-user"></i>
            <input name="ktp" type="file" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Foto</td>
            <i class="fas fa-user"></i>
            <input name="foto" type="file" required>
          </div>
          <div class="space"></div>

          <div class="row button">
            <input type="submit" value="Simpan" style="margin-left: 0px;">
          </div>
         </form>
      </div>
    </div>

  </body>

  @if (session()->has("success"))
    <script>
      Swal.fire({
        title: "Registrasi Akun Berhasil!",
        text: "",
        icon: "success"
      });
    </script>
  @endif

</html>