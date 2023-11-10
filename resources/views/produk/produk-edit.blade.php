@extends('layout')
@section('content')

    <h3 class="text-center fw-bold">Update Produk</h3>
    <form action="{{ route('produk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="my-input">Gambar</label>
            <input class="form-control" type="file" name="gambar" accept="image/*">
            @error('gambar')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="my-input">Kategori</label>
            <select name="kategori_id" id="" class="form-control">
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}" {{ $produk->kategori_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }} </option>
                @endforeach

            </select>
            @error('kategori_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="my-input">Nama Produk</label>
            <input class="form-control" type="text" name="produk" value="{{ $produk->produk }}">
            @error('produk')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="my-input">Deskripsi</label>
            <input class="form-control" type="text" name="deskripsi" value="{{ $produk->deskripsi }}">
            @error('deskripsi')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="my-input">Link</label>
            <input class="form-control" type="text" name="link" value="{{ $produk->link }}">
            @error('link')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>

    </form>
@endsection
