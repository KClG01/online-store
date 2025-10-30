@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit Product
    </div>
    <div class="card-body">
        @if ($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" value="{{$viewData['product']->getName() }}" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="price" value="{{$viewData['product']->getPrice() }}" type="number"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            {{-- SỬA LỖI 1: Thêm id="imageInput" --}}
                            <input class="form-control" type="file" name="image" id="imageInput">
                        </div>
                    </div>
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>
            <div class="mb-3">
                {{-- SỬA LỖI 3: Hiển thị ảnh hiện tại của sản phẩm --}}
                <img id="imagePreview" src="{{ asset('/storage/' . $viewData['product']->getImage()) }}"
                    alt="Image Preview" class="img-fluid rounded"
                    style="max-width: 300px; max-height: 300px; margin-top: 10px;" />
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($viewData['categories'] as $category)
                    {{-- SỬA LỖI 4: Thêm logic 'selected' --}}
                    <option value="{{ $category->getId() }}" @if($category->getId() ==
                        $viewData['product']->getCategoryId()) selected @endif
                        >
                        {{ $category->getName() }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                {{-- SỬA LỖI 2: Thêm id="description_editor" --}}
                <textarea id="description_editor" class="form-control" name="description"
                    rows="3">{{ $viewData['product']->getDescription() }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
ClassicEditor
    .create(document.querySelector('#description_editor'))
    .catch(error => {
        console.error(error);
    });
</script>

<script>
document.getElementById('imageInput').addEventListener('change', function(event) {
    const [file] = event.target.files;
    if (file) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(file);
        // Bỏ style display: none đi, vì ảnh đã luôn hiển thị
    }
});
</script>
@endpush