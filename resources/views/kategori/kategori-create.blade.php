@extends('layout')
@section('content')
    <h3 class="text-center fw-bold">Tambah Kategori</h3>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="my-input">Kategori</label>
            <input id="my-input" class="form-control" type="text" name="nama_kategori">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>

    </form>
@endsection
