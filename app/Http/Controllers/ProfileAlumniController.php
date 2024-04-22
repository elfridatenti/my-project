<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AlumniProfile;

class ProfileAlumniController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.alumni_profile.index', [
            "data" => AlumniProfile::get(),
        ]);
    }

    public function create()
    {
        return view('admin.alumni_profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => "required",
            'profesi' => "required",
            'jurusan' => "required",
            'tahun_lulus' => "required",
            'desk' => "required",
            'img' => "required",
        ]);
        
        $img  = '';

        $profile = new AlumniProfile;
        $profile->nama = $request->nama;        
        $profile->profesi = $request->profesi;        
        $profile->jurusan = $request->jurusan;        
        $profile->tahun_lulus = $request->tahun_lulus;        
        $profile->desk = $request->desk;        

        if ($request->file("img")) {
            $file = $request->file("img");
            $img = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets", $img);
        }

        $profile->img = $img;
        $profile->save();

        return redirect()->route('dashboard.profile_alumni.index')->with('success', "Profile Alumni Berhasil Ditambah!");
    }

    public function edit(Request $request, $id)
    {
        return view('admin.alumni_profile.edit', [
            "data" => AlumniProfile::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => "required",
            'profesi' => "required",
            'jurusan' => "required",
            'tahun_lulus' => "required",
            'desk' => "required",
        ]);
        

        $profile = AlumniProfile::find($id);
        $profile->nama = $request->nama;        
        $profile->profesi = $request->profesi;        
        $profile->jurusan = $request->jurusan;        
        $profile->tahun_lulus = $request->tahun_lulus;        
        $profile->desk = $request->desk;        

        if ($request->file("img")) {
            $img  = '';
            $file = $request->file("img");
            $img = time() . "."  . $file->getClientOriginalExtension();
            $file->move("assets", $img);
            $profile->img = $img;
        }

        $profile->save();

        return redirect()->route('dashboard.profile_alumni.index')->with('success', "Profile Alumni Berhasil Diupdate!");
    }

    public function delete(Request $request, $id)
    {
        $data = AlumniProfile::find($id);
        $data->delete();

        return redirect()->route('dashboard.profile_alumni.index')->with('success', "Profile Alumni Berhasil Dihapus!");
    }
}
