@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card">
    <div class="card-header">
        Mua hàng thành công!
    </div>
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            Chúc mừng, giao dịch mua đã hoàn tất. Số đơn hàng là <b>#{{$viewData['order']->getId() }}</b>
        </div>
    </div>
</div>
@endsection