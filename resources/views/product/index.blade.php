@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

{{-- Thêm CSS cho hiệu ứng hover --}}
@push('styles')
<style>
.product-image-container {
    position: relative;
    /* Quan trọng: làm gốc để định vị lớp phủ */
    display: block;
    /* Giúp thẻ <a> hoạt động như một khối */
    overflow: hidden;
    /* Ẩn đi phần ảnh bị phóng to ra ngoài */
    border-top-left-radius: 0.25rem;
    /* Bo góc cho khớp với card */
    border-top-right-radius: 0.25rem;
}

/* Lớp phủ chứa tên sản phẩm */
.product-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    /* Màu nền đen mờ */
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    /* Chữ màu trắng */

    /* Căn giữa tên sản phẩm một cách hoàn hảo */
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 1rem;

    /* Ẩn đi lúc ban đầu và thêm hiệu ứng chuyển động */
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

/* Khi di chuột vào container, lớp phủ sẽ hiện ra */
.product-image-container:hover .product-image-overlay {
    opacity: 1;
}

/* Thêm hiệu ứng phóng to nhẹ cho ảnh để đẹp hơn */
.product-image-container img {
    transition: transform 0.3s ease-in-out;
}

.product-image-container:hover img {
    transform: scale(1.05);
}
</style>
@endpush


@section('content')
<div class="row">
    @foreach ( $viewData['products'] as $product )
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card rounded pointer h-100">

            {{-- BỌC ẢNH VÀ LỚP PHỦ TRONG MỘT CONTAINER --}}
            <a href="{{route('product.show', ['id' => $product->getId()])}}" class="product-image-container">

                {{-- Ảnh sản phẩm --}}
                <img src="{{ asset('/storage/'.$product->getImage())}}" class="card-img-top"
                    style="height: 300px; object-fit: cover;" alt="{{ $product->getName() }}">

                {{-- LỚP PHỦ CHỨA TÊN SẢN PHẨM (SẼ ẨN BAN ĐẦU) --}}
                <div class="product-image-overlay">
                    <h5 class="fw-bold">{{ $product->getName() }}</h5>
                </div>

            </a>

            <div class="card-body text-center">
                <a href="{{route('product.show', ['id' => $product->getId()])}}" class="btn btn-primary text-white">Xem
                    chi tiết</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $viewData['products']->links() }}
</div>
@endsection