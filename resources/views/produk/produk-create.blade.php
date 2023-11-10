@extends('layout')
@section('content')
    <h3 class="text-center fw-bold">Tambah Kategori</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="my-input">Gambar</label>
            <input class="form-control" type="file" name="gambar" accept="image/*">
        </div>

        <div class="form-group">
            <label for="my-input">Kategori</label>
            <select name="kategori_id" id="" class="form-control">
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kategori }} </option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="my-input">Nama Produk</label>
            <input class="form-control" type="text" name="produk">
        </div>

        <div class="form-group">
            <label for="my-input">Deskripsi</label>
            <input class="form-control" type="text" name="deskripsi">
        </div>
        <div class="form-group">
            <label for="my-input">Link</label>
            <input class="form-control" type="text" name="link">
        </div>



        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>

    </form>
@endsection
