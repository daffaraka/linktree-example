@extends('layout')
@section('content')
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Kategori </h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-success">{{$kategori}}</span></li>
                </ul>
            </div>

        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Produk</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash2"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-purple">{{$produk}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    </div>
@endsection
