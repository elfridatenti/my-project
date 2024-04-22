<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="images/logo.png">
  <title>Data Diri</title>
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
            <td>Data Diri</td>
        </div>
        <form action="{{ route('save_data_diri') }}" method="post" enctype="multipart/form-data"> 
         @csrf
          <div class="row">
            <td>Nama Lengkap</td>
            <i class="fas fa-user"></i>
            <input name="nama_lengkap" type="text" placeholder="Nama Lengkap" required>
          </div>
          <div class="space"></div>

           <div class="row">
            <td>No. KTP</td>
            <i class="fas fa-user"></i>
            <input name="no_ktp" type="number" placeholder="No. KTP"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>No. Telp</td>
            <i class="fas fa-user"></i>
            <input name="no_telp" type="number" placeholder="No. Telp"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Nama Ibu Kandung</td>
            <i class="fas fa-user"></i>
            <input name="ibu_kandung" type="text" placeholder="Nama Ibu Kandung" required>
          </div>
          <div class="space"></div>

          <div class="row">
           <td>Jenis Kelamin</td>
            <i class="fas fa-user"></i>
            <select name="jk" id="">
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Tempat Lahir</td>
            <i class="fas fa-user"></i>
            <input name="tempat_lahir" type="text" placeholder="Tempat Lahir"  required>
          </div>
          <div class="space"></div>

           <div class="row">
            <td>Tanggal Lahir</td>
            <i class="fas fa-user"></i>
            <input name="tanggal_lahir" type="date" placeholder="Tanggal Lahir"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Alamat</td>
            <i class="fas fa-user"></i>
            <input name="alamat" type="text" placeholder="Alamat"  required>
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