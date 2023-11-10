@extends('front-end.layout')
@section('content')
    {{-- Sampul and Profil --}}
    <div class="container-fluid p-0" id="sampul-profil" >
        <div class="card" id="sampul-card">
            <div class="card-body">
                <form action="{{ route('linktree.search') }}" method="POST" class="d-flex">
                    @csrf
                    <div class="input-group mb-3 bg-light rounded-3">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Pencarian</button>
                        <input type="text" name="keyword" class="form-control" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">

                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="container-fluid px-3 py-3">
        <h3>Hasil pencarian dari  <span class="fw-bold"> "{{$keyword}}"</span>  </h3>
        <div class="row my-3 py-4 rounded" style="background: gray;">
            @foreach ($produks as $produk)
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <a href="{{ $produk->link }}" class="text-decoration-none text-dark">
                        <div class="card border border-2 border-gray shadow-sm my-2 rounded">
                            <div class="card-body p-0">
                                <div class="card pb-0">
                                    <img class="card-img-top p-0 produk-img"
                                        src="{{ asset('Gambar Produk/' . $produk->gambar) }}" alt="">
                                    <div class="card-body mb-0 py-3 pb-2 px-4">
                                        <h3 class="card-title">{{ $produk->produk }}</h3>
                                        <h4 class="card-text mb-0 pb-0">{{ $produk->deskripsi }}</h4>
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
