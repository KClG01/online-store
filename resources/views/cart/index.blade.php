@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="card">
    <div class="card-header">
        <br>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['products'] as $product)
                <tr>
                    <!-- <td>{{ $product->getId() }}</td> -->
                    <td>{{ $product->getName() }}</td>
                    <td>{{ number_format($product->getPrice(), 0, ',', '.')  }} ₫</td>
                    <td>{{ session('products')[$product->getId()] }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Tổng:</b>
                    {{ number_format($viewData['total'], 0, ',', '.')  }} ₫</a>
                <a class="btn bg-primary text-white mb-2">Thanh toán</a>
                <a href="{{ route('cart.delete') }}">
                    <button class="btn btn-danger mb-2">
                        Xóa tất cả
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection