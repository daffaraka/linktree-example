@extends('front-end.layout')
@section('content')
    {{-- Sampul and Profil --}}
    <div class="card-body">
        <div class="input-group mb-3 bg-light rounded-3">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1">Pencarian</button>
            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                aria-describedby="button-addon1">
        </div>
    </div>


    <div class="container-fluid py-4">
        <h3 class="fw-bold">{{ $kategories->nama_kategori }}</h3>
        <div class="row my-3">
            @foreach ($kategories->produk as $produk)
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6o">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card border border-2 border-gray shadow-sm my-2">
                            <div class="card-body p-0">
                                <div class="card">
                                    <img class="card-img-top p-0 produk-img"
                                        src="{{ asset('Gambar Produk/' . $produk->gambar) }}" alt="">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $produk->produk }}</h3>
                                        <h4 class="card-text">{{ $produk->deskripsi }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
