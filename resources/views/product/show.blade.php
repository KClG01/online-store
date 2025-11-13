@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

{{-- Đẩy CSS tùy chỉnh vào layout --}}
@push('styles')
<style>
.description-container {
    position: relative;
    text-align: center;
    /* Căn giữa nút Xem thêm */
}

/* Lớp bao bọc nội dung mô tả */
.description-content {
    /* Giới hạn chiều cao ban đầu, chỉ hiển thị vài dòng */
    max-height: 20%;
    overflow: hidden;
    text-align: left;
    /* Căn lề trái cho văn bản */
    position: relative;
    /* Hiệu ứng chuyển động mượt mà khi mở rộng/thu gọn */
    transition: max-height 0.5s ease-in-out;
}

/* Khi nội dung được mở rộng (Bootstrap thêm class .show) */
.description-content.show {
    /* Chiều cao đủ lớn để chứa toàn bộ nội dung */
    max-height: 100%;
}

/* Tạo hiệu ứng mờ dần ở cuối nội dung khi chưa mở rộng */
.description-container:not(.expanded)::after {
    content: '';
    position: absolute;
    bottom: 40px;
    /* Vị trí của lớp mờ, phía trên nút */
    left: 0;
    width: 100%;
    height: 60px;
    /* Hiệu ứng gradient từ trong suốt sang màu nền (giả sử là trắng) */
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
    pointer-events: none;
    /* Cho phép click xuyên qua lớp mờ */
}

/* Nút Xem thêm/Thu gọn */
#toggleDescriptionBtn {
    margin-top: 1rem;
    cursor: pointer;
    font-weight: 500;
    color: #0d6efd;
    /* Màu xanh dương giống trong ảnh */
    background-color: transparent;
    border: none;
    padding: 5px 15px;
}
</style>
@endpush


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('/storage/' . $viewData['product']->getImage()) }}" class="img-fluid rounded w-100"
                    style="object-fit: contain; max-height: 400px;">
            </div>
            <div class="col-md-8">
                <h3 class="fw-bold">{{ $viewData['product']->getName() }}</h3>
                <div class="mb-4">
                    <span class="h4 text-danger fw-bold">
                        {{ number_format($viewData['product']->getPrice(), 0, ',', '.') }} ₫
                    </span>
                    <div class="mb-4">
                        <strong>Tình trạng:</strong>
                        @if ($viewData['product']->getStock() == 0)
                        <span class="text-danger fw-bold">HẾT HÀNG</span>
                        @else
                        <span class="text-success fw-bold">CÒN HÀNG</span>
                        @endif
                    </div>
                    <div>
                        <form method="POST" action="{{ route('cart.add', ['id' =>$viewData['product']->getId()]) }}">
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-text">Số lượng</div>
                                        <input type="number" min="1" max="10" class="form-controlquantity-input"
                                            name="quantity" value="1">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-auto">
                                    <button class="btn btn-primary btn-lg me-2" type="submit">Thêm vào giỏ</button>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-success btn-lg">Mua ngay</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-12">
                    <h4 class="fw-bold">Thông tin chi tiết sản phẩm</h4>
                    <div id="descriptionContainer" class="description-container">
                        <div id="descriptionContent" class="description-content collapse">
                            {!! $viewData['product']->getDescription() !!}
                        </div>
                        <button id="toggleDescriptionBtn" class="btn p-0" data-bs-toggle="collapse"
                            data-bs-target="#descriptionContent" aria-expanded="false"
                            aria-controls="descriptionContent">
                            Xem thêm <i class="fas fa-chevron-down fa-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const descriptionContainer = document.getElementById('descriptionContainer');
        const collapseElement = document.getElementById('descriptionContent');
        const toggleButton = document.getElementById('toggleDescriptionBtn');

        // Lắng nghe sự kiện khi nội dung BẮT ĐẦU MỞ RỘNG
        collapseElement.addEventListener('show.bs.collapse', function() {
            toggleButton.innerHTML = 'Thu gọn <i class="fas fa-chevron-up fa-xs"></i>';
            descriptionContainer.classList.add('expanded'); // Thêm class để CSS nhận biết và xóa lớp mờ
        });

        // Lắng nghe sự kiện khi nội dung BẮT ĐẦU THU GỌN
        collapseElement.addEventListener('hide.bs.collapse', function() {
            toggleButton.innerHTML = 'Xem thêm <i class="fas fa-chevron-down fa-xs"></i>';
            descriptionContainer.classList.remove('expanded'); // Xóa class để CSS thêm lại lớp mờ
        });
    });
    </script>
    @endpush