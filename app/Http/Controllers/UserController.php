<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::first();
        $data['title'] = 'User | Linktree Shopee';
        return view('user.user-index', $data);
    }


    public function edit()
    {
        $data['title'] = 'Edit User | Linktree Shopee';
        $data['user'] = User::find(Auth::user()->id);

        return view('user.user-edit', $data);
    }

    public function update(Request $request)
    {

        // dd($request->all());
        $user = User::first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'bio' => 'required',
            'sampul' => 'required|mimes:png,jpg,jpeg,svg,gif',
            'foto_profil' => 'required|mimes:png,jpg,jpeg,svg,gif',

        ],[
            'name.required' => 'Nama harus diisi',
            'bio.required' => 'Bio harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Harus berformat email',
            'sampul.required' => 'Sampul harus diisi',
            'foto_profil.required' => 'Foto Profil harus diisi'
        ]);
        // Foto Profil
        $fileProfil = $request->file('foto_profil');
        $fileProfilExt = $fileProfil->getClientOriginalExtension();
        $fileProfilSave = 'Profil.' . $fileProfilExt;
        $pathProfil = 'Profil/Foto Profil/';


        if (File::exists('Profil/Foto Profil/' . $user->foto_profil)) {
            File::delete('Profil/Foto Profil/' . $user->foto_profil);
            $fileProfil->move($pathProfil, $fileProfilSave);
        } else {
            $fileProfil->move($pathProfil, $fileProfilSave);
        }

        $fileSampul = $request->file('sampul');
        $fileSampulExt = $fileSampul->getClientOriginalExtension();
        $fileSampulSave = 'Sampul.' . $fileSampulExt;
        $pathSampul = 'Profil/Sampul/';

        if (File::exists('Profil/Sampul/' . $user->sampul)) {
            File::delete('Profil/Sampul/' . $user->sampul);
            $fileSampul->move($pathSampul, $fileSampulSave);
        } else {
            $fileSampul->move($pathSampul, $fileSampulSave);
        }

        $user->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'bio' => $request->bio,
                'sampul' => 'Sampul.' . $fileSampulExt,
                'foto_profil' => 'Profil.' . $fileProfilExt


            ]
        );

        return redirect()->route('user');
    }

    // public function destroy($id)
    // {
    //     $kategori = Kategori::find($id);
    //     $kategori->delete();

    //     return redirect()->route('kategori');
    // }
}
