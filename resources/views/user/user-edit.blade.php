@extends('layout')
@section('content')
    <form action="{{ route('user.update') }}" enctype="multipart/form-data" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="row">

            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Foto Profil</label>
                            <div class="d-flex">
                                <input type="file" name="foto_profil" id="foto-profil" class="form-control"
                                    accept="image/*">
                            </div>
                            <img class="img-thumbnail" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                style="max-height: 250px;" id="foto-profil-preview">
                            @error('foto_profil')
                                <div class="alert alert-primary" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="my-input">Sampul</label>
                            <div class="d-flex">
                                <input type="file" name="sampul" id="sampul" class="form-control" accept="image/*">
                            </div>
                            <img class="img-thumbnail" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                style="max-height: 250px;" id="sampul-preview">

                            @error('sampul')
                                <div class="alert alert-primary" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-12">

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Nama</label>
                            <input id="my-input" class="form-control" type="text" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Email</label>
                            <input id="my-input" class="form-control" type="text" name="email"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Bio</label>
                            <input id="my-input" class="form-control" type="text" name="bio"
                                value="{{ Auth::user()->bio }}">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Password</label>
                            <input id="my-input" class="form-control" type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Password Confirmation</label>
                            <input id="my-input" class="form-control" type="password" name="password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-4">
                    <button type="submit" class="btn btn-primary px-3">Update</button>
                    <a href="{{ url()->previous() }}" class="btn btn-success">Edit Profile</a>

                </div>
            </div>



        </div>
    </form>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {


        $('#foto-profil').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#foto-profil-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });

    $(document).ready(function(e) {


        $('#sampul').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#sampul-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });
</script>
