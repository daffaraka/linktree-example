@extends('layout')
@section('content')
    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Data Produk</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped my-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($produk as $data)
                    <tr>
                        <th>{{$loop->iteration}} </th>
                        <td>{{$data->Kategori->nama_kategori}}</td>
                        <td>{{$data->produk }}</td>
                        <td>
                            <img class="img-thumbnail" style="width: 200px;" src="{{asset('Gambar Produk/'.$data->gambar)}}" alt="">
                        </td>
                        <td>{{$data->deskripsi}}</td>
                        <td>{{$data->link}}</td>
                        <td>
                            <a href="{{route('produk.edit',$data->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('produk.destroy',$data->id)}}" class="btn btn-danger">Hapus</a>

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
