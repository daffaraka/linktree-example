
    @foreach ($produks as $produk)
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <a href="{{ $produk->link }}" class="text-decoration-none text-dark">
                <div class="card shadow-sm my-2">
                    <div class="card-body p-0">
                        <div class="card pb-0">
                            <img class="card-img-top p-0  produk-img"
                                src="{{ asset('Gambar Produk/' . $produk->gambar) }}" alt="">
                            <div class="card-body product-card mb-0 py-3 pb-2 px-2">
                                <h4 class="text-line-2" id="title-{{ $produk->id }}">{{ $produk->produk }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
