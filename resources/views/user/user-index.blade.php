@extends('layout')
@section('content')
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="my-input">Foto Profil</label>
                        <div class="d-flex">
                            <img class="img-thumbnail" src="{{asset('Profil/Foto Profil/'.Auth::user()->foto_profil)}}" alt="{{Auth::user()->foto_profil}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Sampul</label>
                        <div class="d-flex">
                            <img class="img-thumbnail" src="{{asset('Profil/Sampul/'.Auth::user()->sampul)}}" alt="{{Auth::user()->sampul}}">

                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="my-input">Nama</label>
                        <input id="my-input" class="form-control" type="text" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Email</label>
                        <input id="my-input" class="form-control" type="text" value="{{ Auth::user()->email }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Bio</label>
                        <input id="my-input" class="form-control" type="text" value="{{ Auth::user()->bio }}" disabled>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{route('user.edit')}}" class="btn btn-success">Edit Profile</a>

            </div>
        </div>

    </div>
@endsection
