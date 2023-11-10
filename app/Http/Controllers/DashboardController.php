<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $data['title'] = 'Dashboard | Linktree Shopee';
        $data['produk'] = Produk::count();
        $data['kategori'] = Kategori::count();

        // dd($data);
        return view('dashboard',$data);
    }
}
