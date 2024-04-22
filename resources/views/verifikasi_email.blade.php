<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="images/logo.png">
  <title>Verifikasi Email</title>
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
            <td>Verifikasi Email</td>
        </div>
        <form action="{{ route('verifikasi_token') }}" method="post" enctype="multipart/form-data"> 
         @csrf

         <center>
           <h3>TOKEN</h3>
         </center>

          <div class="row">
            <input name="token" type="number" required style="padding-left: 10px;">
            <small>
           <p>Token Telah Dikirimkan Ke Email Anda</p>
            </small>
          </div>
          <div class="space"></div>

          <div class="row button" >
            <input type="submit" value="Verifikasi" style="margin-left: 0px;">
          </div>
         </form>
      </div>
    </div>

  </body>

  @if (session()->has("error"))
    <script>
      Swal.fire({
        title: "Token Salah!",
        text: "",
        icon: "error"
      });
    </script>
  @endif

</html>