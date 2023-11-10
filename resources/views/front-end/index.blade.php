@extends('front-end.layout')
@section('content')
    {{-- Sampul and Profil --}}
    <div class="container-fluid p-0" id="sampul-profil" style="background-image: url('{{ $sampulPath }}')">
        <div class="card" id="sampul-card">
            <div class="card-body">
                <form action="{{ route('linktree.search') }}" method="POST" class="d-flex">
                    @csrf
                    <div class="input-group mb-3 bg-light rounded-3">


                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1"><i
                                class="fas fa-search"></i> </button>
                        <input type="text" name="keyword" class="form-control" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">


                    </div>
                </form>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-4">
                        <img src="{{ $profilPath }}" class="p-0 border-0 rounded-circle" id="foto-profil">
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <h5 class="card-title fw-bold">{{ $user->name ?? 'Anonim' }}</h5>
                        <p class="card-text">
                            {{ $user->bio ??
                                '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum asperiores veritatis at quod cumque aliquid provident, aut praesentium sed aspernatur quam nostrum fugit impedit aperiam porro saepe dignissimos nobis nulla.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ' }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid p-3">

        <div id="data-wrapper-kategori" style="height: 100px;">

            <div class="row my-3" id="row-kategori">
                @foreach ($kategories as $kategori)
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 item">
                        <a href="{{ route('linktree.kategori', $kategori->id) }}" class="text-decoration-none text-dark">
                            <div class="card border border-2 border-gray shadow-sm my-2">
                                <div class="card-body text-center">
                                    <h6 class="card-title mb-0">{{ $kategori->nama_kategori }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
        <div class="text-center">

            <button class="btn btn-success load-more-data my-2"><i class="fa fa-refresh"></i> Lebih Banyak</button>
            <button class="btn btn-primary show-less my-2" onclick="showLess()"><i class="fa fa-refresh"></i> Lebih
                Sedikit</button>

        </div>
        <div class="auto-load text-center" style="display: none;">

            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />

                </path>

            </svg>

        </div>

        <hr>
        <div class="row my-3 py-3" style="background: gray;">



            <div id="data-wrapper" class="row">
                @include('front-end.data')
            </div>




            <div class="auto-load text-center text-dark mt-5 bg-light p-3" style="display: none;">

                <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                    enable-background="new 0 0 0 0" xml:space="preserve">

                    <path fill="#000"
                        d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

                        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                            from="0 50 50" to="360 50 50" repeatCount="indefinite" />

                    </path>

                </svg>

            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var originalHeight = $("#row-kategori").outerHeight(); // Ketinggian awal #row-kategori
        var $dataWrapper = $("#data-wrapper-kategori");

        // Fungsi untuk menambahkan ketinggian #data-wrapper
        function increaseHeight() {
            var newHeight = $dataWrapper.outerHeight() +
                originalHeight; // Menambahkan tinggi yang sama dengan #row-kategori
            $dataWrapper.css("height", newHeight + "px");
        }

        // Fungsi untuk mengurangkan ketinggian #data-wrapper
        function showLess() {
            $dataWrapper.css("height", "100px"); // Mengatur ketinggian kembali ke 100px
        }

        // Saat tombol "Lebih Banyak" ditekan, panggil fungsi increaseHeight
        $(".load-more-data").click(function() {
            increaseHeight();
        });

        // Saat tombol "Lebih Sedikit" ditekan, panggil fungsi showLess
        $(".show-less").click(function() {
            showLess();
        });



        var ENDPOINT = "{{ route('linktree') }}";

        var page = 1;

        $(window).scroll(function() {

            if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 20)) {

                page++;

                infinteLoadMore(page);

            }

        });


        function infinteLoadMore(page) {

            $.ajax({

                    url: ENDPOINT + "?page=" + page,

                    datatype: "html",

                    type: "get",

                    beforeSend: function() {

                        $('.auto-load').show();

                    }

                })

                .done(function(response) {

                    if (response.html == '') {

                        $('.auto-load').html("Tidak ada produk lagi untuk ditampilkan");

                        return;

                    }

                    $('.auto-load').hide();

                    $("#data-wrapper").append(response.html);

                })

                .fail(function(jqXHR, ajaxOptions, thrownError) {

                    console.log('Server error occured');

                });

        }
    </script>
@endsection
