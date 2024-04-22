<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="images/logo.png">
  <title>Register Page</title>
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
            <td>Buat Akun</td>
        </div>
        <form action="{{ route('create_alumni_account') }}" method="post" enctype="multipart/form-data"> 
         @csrf
          <div class="row">
            <td>Email</td>
            <i class="fas fa-user"></i>
            <input name="email" type="email" placeholder="Email" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Password</td>
            <i class="fas fa-user"></i>
            <input name="password" type="password" placeholder="Password" required>
          </div>
          <div class="space"></div>

          {{-- <div class="row">
            <td>Jenis Kelamin</td>
            <i class="fas fa-user"></i>
            <select name="jenis_kelamin" id="">
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>NIM</td>
            <i class="fas fa-user"></i>
            <input name="nim" type="number" placeholder="NIM"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Jurusan</td>
            <i class="fas fa-user"></i>
            <input name="jurusan" type="text" placeholder="Jurusan"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Alamat</td>
            <i class="fas fa-user"></i>
            <input name="alamat" type="text" placeholder="Alamat"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Pekerjaan</td>
            <i class="fas fa-user"></i>
            <input name="pekerjaan" type="text" placeholder="Pekerjaan"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Tahun Lulus</td>
            <i class="fas fa-user"></i>
            <input name="tahun_lulus" type="number" placeholder="Tahun Lulus"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Email</td>
            <i class="fas fa-user"></i>
            <input name="email" type="email" placeholder="Email"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Tanggal Lahir</td>
            <i class="fas fa-user"></i>
            <input name="tgl_lahir" type="date" placeholder="Tanggal Lahir"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Gambar Anda</td>
            <i class="fas fa-user"></i>
            <input name="img_alumni" type="file" placeholder="NIM"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Username</td>
            <i class="fas fa-user"></i>
            <input name="username" type="text" placeholder="Username"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>password</td>
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password" id="password" required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Agama</td>
            <i class="fas fa-user"></i>
            <select name="agama" id="" required>
              <option value="">Pilih Agama</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Katolik">Katolik</option>
              <option value="Budha">Budha</option>
              <option value="Kong Hu Cu">Kong Hu Cu</option>
            </select>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>No. Telp</td>
            <i class="fas fa-user"></i>
            <input name="no_telp" type="number" placeholder="No Telp"  required>
          </div>
          <div class="space"></div>

          <div class="row">
            <td>Ijazah</td>
            <i class="fas fa-user"></i>
            <input name="img_izajah_alumni" type="file"  required>
          </div>
          <div class="space"></div> --}}

          <div class="row button">
            <input type="submit" value="Verifikasi Email" style="margin-left: 0px;">
          </div>
         </form>
      </div>
    </div>

  </body>

  @if (session()->has("success"))
    <script>
      Swal.fire({
        title: "Registrasi Akun Berhasil, Silahkan Login!",
        text: "",
        icon: "success"
      });

      setTimeout(() => {
        location.replace('{{ route('beranda') }}');
      }, 3000);
    </script>
  @endif

</html>