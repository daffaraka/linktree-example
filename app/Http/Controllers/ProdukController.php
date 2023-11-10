<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{

    public function index()
    {
        $data['produk'] = Produk::all();
        $data['title'] = 'Produk | Linktree Shopee';
        return view('produk.produk-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategori'] = Kategori::all();
        $data['title'] = 'Buat Produk | Linktree Shopee';
        return view('produk.produk-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'produk' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg,svg',

        ], [
            'produk.required' => 'Produk harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'link.required' => 'Link harus diisi',
            'gambar.required' => 'Foto Profil harus diisi'
        ]);
        $file = $request->file('gambar');

        $fileName = $file->getClientOriginalName();
        $fileSave = $request->produk . '-' . $fileName;
        $path = 'Gambar Produk/';

        $file->move($path, $fileSave);



        Produk::create([
            'kategori_id' => $request->kategori_id,
            'produk' => $request->produk,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'gambar' => $fileSave,

        ]);

        return redirect()->route('produk');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Produk | Linktree Shopee';
        $data['produk'] = Produk::find($id);
        $data['kategori'] = Kategori::all();
        return view('produk.produk-edit', $data);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        $request->validate([
            'produk' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg,svg',
        ], [
            'produk.required' => 'Produk harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'link.required' => 'Link harus diisi',
        ]);

        $file = $request->file('gambar');

        if ($request->has('gambar')) {
            $fileName = $file->getClientOriginalName();
            $fileSave = $request->produk . '-' . $fileName;
            $path = 'Gambar Produk/';

            if (File::exists('Gambar Produk/' . $produk->gambar)) {
                File::delete('Gambar Produk/' . $produk->gambar);
                $file->move($path, $fileSave);
            } else {
                $file->move($path, $fileSave);
            }
        }


        $produk->update([
            'kategori_id' => $request->kategori_id,
            'produk' => $request->produk,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'gambar' => $fileSave ?? $produk->gambar,

        ]);

        return redirect()->route('produk');
    }


    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (File::exists('Gambar Produk/' . $produk->gambar)) {
            File::delete('Gambar Produk/' . $produk->gambar);
            $produk->delete();
        } else {
            $produk->delete();
        }

        return redirect()->route('produk');
    }
}
