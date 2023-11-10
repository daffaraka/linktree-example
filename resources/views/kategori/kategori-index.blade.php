@extends('layout')
@section('content')
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Data Kategori</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped my-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategories as $kategori)
                    <tr>
                        <th>{{$loop->iteration}} </th>
                        <td>{{$kategori->nama_kategori}}</td>
                        <td>
                            <a href="{{route('kategori.edit',$kategori->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('kategori.destroy',$kategori->id)}}" class="btn btn-danger">Hapus</a>

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
