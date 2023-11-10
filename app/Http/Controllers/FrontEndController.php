<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    public function index(Request $request)
    {

        $user = User::first();
        $data['title'] = 'Linktree';
        $data['sampulPath'] = '/Profil/Sampul/' . $user->sampul;
        $data['profilPath'] = '/Profil/Foto Profil/' . $user->foto_profil;
        $data['user'] = $user;
        $data['kategories'] = Kategori::all();
        $data['produks'] = Produk::with('kategori')->paginate(10);

        if ($request->ajax()) {

            $produks = Produk::with('kategori')->paginate(10);

            $view = view('front-end.data', compact('produks'))->render();

            return response()->json(['html' => $view]);
        }



        return view('front-end.index', $data);
    }

    public function kategori($id)
    {
        $data['title'] = 'Kategori | Linktree';
        $data['kategories'] = Kategori::with('produk')->find($id);

        return view('front-end.kategori-list', $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        // Jika kata kunci tidak kosong, lakukan pencarian
        $data['title'] = 'Hasil pencarian ' . $keyword;
        $data['produks'] = '';
        if (!empty($keyword)) {
            $data['produks'] = Produk::where(function ($query) use ($keyword) {
                $query->where('produk', 'like', '%' . $keyword . '%')
                    ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
            })->get();
        } else {
            // Jika kata kunci kosong, tampilkan semua data
            $data['produks'] = Produk::all();
        }

        $data['keyword'] = $keyword;
        // Kemudian, kamu dapat mengirim data hasil pencarian ke tampilan
        return view('front-end.hasil-cari', $data);
    }
}
