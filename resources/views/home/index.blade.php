@extends('layouts.app')

@section('title', $viewData["title"])
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-4 mb-2">
        <a href="{{ route('product.index') }}">
            <img src="{{ asset('/img/drone.png') }}" class="img-fluid rounded pointer"></a>
    </div>
    <div class="col-md-6 col-lg-4 mb-2">
        <a href="{{ route('product.index') }}">
            <img src="{{ asset('/img/game.png') }}" class="img-fluid rounded pointer"></a>
    </div>
    <div class="col-md-6 col-lg-4 mb-2">
        <a href="{{ route('product.index') }}">
            <img src="{{ asset('/img/philips.png') }}" class="img-fluid rounded pointer"></a>
    </div>
</div>
@endsection