<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $data['kategories'] = Kategori::all();
        $data['title'] = 'Kategori | Linktree Shopee';
        return view('kategori.kategori-index', $data);
    }

    public function create()
    {
        $data['title'] = 'Buat Kategori | Linktree Shopee';

        return view('kategori.kategori-create',$data);
    }


    public function store(Request $request)
    {
        Kategori::create(
            [
                'nama_kategori' => $request->nama_kategori
            ]
        );

        return redirect()->route('kategori');
    }


    public function edit($id)
    {
        $data['title'] = 'Buat Kategori | Linktree Shopee';
        $data['kategori'] = Kategori::find($id);

        return view('kategori.kategori-edit',$data);
    }

    public function update(Request $request,$id)
    {
        $kategori = Kategori::find($id);
        $kategori->update($request->all());
        return redirect()->route('kategori');

    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori');

    }
}
