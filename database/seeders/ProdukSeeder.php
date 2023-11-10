<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;

        for ($i = 1; $i < 50; $i++) {
            Produk::create([
                'kategori_id' => 1,
                'produk' => 'Produk '.$i,
                'deskripsi' => 'Deskripsi untuk produk '.$i,
                'link' => 'google.com',
                'gambar' => 'Nasgor-nasgor.jpg',

            ]);
        }
    }
}
