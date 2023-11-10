@extends('layout')
@section('content')
    <h3 class="text-center fw-bold">Edit Kategori</h3>
    <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="my-input">Kategori</label>
            <input id="my-input" class="form-control" type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>

    </form>
@endsection
