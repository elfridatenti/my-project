<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Datadiri;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AuthController extends Controller
{
    public function login()
    {
       return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        (Auth::attempt($credentials));
 
        if (Auth()->attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth()->user()->role === "alumni") {

                if ( Auth()->user()->email_verified_at == null ) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect('/login')->with('error', 'Email Anda Belum Diverifikasi!');
                }

                return redirect()->route('alumni.index');

            } else {

                return redirect()->route('dashboard.profile_alumni.index');

            }
        }
 
        Session::flash('status', 'failed');
        Session::flash('message', 'password salah');

        return redirect('/login')->with('error', 'Email / Password Salah!');
    }

    public function logout(request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil Logout!');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function sendMain($email, $token)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            // xebi hhrq krxo kblg 
            $mail->Username   = 'layanan.ikaundip@gmail.com';                     //SMTP username
            $mail->Password   = 'xebihhrqkrxokblg';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            // $mail->Port       = 587;

            //Recipients
            $mail->setFrom('layanan.ikaundip@gmail.com', 'Layanan IKAUNDIP');
            $mail->addAddress($email);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $token = $token;
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Verifikasi Email';
            $mail->Body    = "<b>{$token}</b> adalah token untuk verifikasi email Anda.";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "<pre>";
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function create_alumni_account(Request $request)
    {
        $request->validate([
            "email" => "required|unique:users",
            "password" => "required",
        ]);

        $token = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

        $request->session()->put('email', $request->email);

        $user = new User;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->token = $token;
        $user->role = "alumni";
        $user->save();

        $this->sendMain($user->email, $token);

        // Fungsi Kirim Token Ke Email User Di sini!

        return redirect()->route('verifikasi_email');
    }

    public function verifikasi_email(Request $request)
    {
        $email = $request->session()->get('email');

        $user = User::where('email', $email)->get();

        if ($user[0]->email_verified_at) {
            return redirect()->route('data_diri');
        }

        return view('verifikasi_email', ['email' => $email]);
    }

    public function verifikasi_token(Request $request)
    {
        $request->validate(["token" => "required"]);

        $email = $request->session()->get('email');
        $token = $request->token;
        $user = User::where('email', $email)->get();

        $user_token = $user[0]->token;

        if ($token != $user_token) {
            return redirect()->route('verifikasi_email')->with('error', 'Token Salah!!');
        }

        User::where('email', $email)->update(
            ['email_verified_at' => date("Y-m-d H:s:i")]);

        return redirect()->route('data_diri');
    }

    public function data_diri(Request $request)
    {
        $email = $request->session()->get('email');

        $user = User::where('email', $email)->get();
        $id_user = $user[0]->id;

        $data_diri = Datadiri::where('user_id', $id_user)->get();

        if (count($data_diri)) {
            return redirect()->route('data_alumni');
        }

        return view('data_diri');
    }

    public function save_data_diri(Request $request) 
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
            'ibu_kandung' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $email = $request->session()->get('email');
        $user = User::where('email', $email)->get();

        $user_id = $user[0]->id;

        $data_diri = new Datadiri;
        $data_diri->nama_lengkap = $request->nama_lengkap;
        $data_diri->no_ktp = $request->no_ktp;
        $data_diri->no_telp = $request->no_telp;
        $data_diri->ibu_kandung = $request->ibu_kandung;
        $data_diri->jk = $request->jk;
        $data_diri->tempat_lahir = $request->tempat_lahir;
        $data_diri->tanggal_lahir = $request->tanggal_lahir;
        $data_diri->alamat = $request->alamat;
        $data_diri->user_id = $user_id;
        $data_diri->save();

        return redirect()->route('data_alumni');
    }

     public function data_alumni(Request $request)
    {
        $email = $request->session()->get('email');
        $user = User::where('email', $email)->get();

        $id_user = $user[0]->id;

        $alumni = Alumni::where('user_id', $id_user)->get();

        if (count($alumni)) {
            return redirect()->route('register')->with('success', "Registerasi Akun Anda Selesai!");
        }

        return view('alumni');
    }

     public function save_data_alumni(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'angkatan' => 'required',
            'tahun_lulus' => 'required',
            'jurusan' => 'required',
            'profesi' => 'required',
            'nama_instansi' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'ijazah' => 'required',
            'ktp' => 'required',
            'foto' => 'required',
        ]);

        $email = $request->session()->get('email');
        $user = User::where('email', $email)->get();

        $user_id = $user[0]->id;

        $ijazah = "";
        $ktp = "";
        $foto = "";

        if ($request->file("ijazah")) {
            $file = $request->file("ijazah");
            $ijazah = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets", $ijazah);
        }

        if ($request->file("ktp")) {
            $file = $request->file("ktp");
            $ktp = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets", $ktp);
        }

        if ($request->file("foto")) {
            $file = $request->file("foto");
            $foto = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets", $foto);
        }


        $alumni = new Alumni;
        $alumni->nim = $request->nim;
        $alumni->angkatan = $request->angkatan;
        $alumni->tahun_lulus = $request->tahun_lulus;
        $alumni->jurusan = $request->jurusan;
        $alumni->profesi = $request->profesi;
        $alumni->nama_instansi = $request->nama_instansi;
        $alumni->alamat = $request->alamat;
        $alumni->kota = $request->kota;
        $alumni->ijazah = $ijazah;
        $alumni->ktp = $ktp;
        $alumni->foto = $foto;
        $alumni->user_id = $user_id;
        $alumni->save();

        return redirect()->route('register')->with('success', "Registerasi Akun Anda Selesai!");
    }
}
