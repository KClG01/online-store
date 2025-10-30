@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')

<div class="card mb-4">
    <div class="card-header"> Create Products
    </div>
    <div class="card-body">
        @if ($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="price" value="{{ old('price') }}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input class="form-control" type="file" name="image" id="imageInput">
                        </div>
                    </div>
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>
            <div class="mb-3">
                <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid rounded"
                    style="display: none; max-width: 300px; max-height: 300px; margin-top: 10px;" />
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($viewData['categories'] as $category)
                    <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea id="description_editor" class="form-control" name="description"
                    rows="3">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header"> Quản lý sản phẩm
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['products'] as $product)
                <tr>
                    <td>{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm"
                            href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}">
                            <!-- <button class="btn btn-primary btn-sm"> -->
                            <i class="bi bi-pencil-square"></i> Edit
                            <!-- </button> -->
                        </a>
                    </td>
                    <td>
                        <form action="{{route ('admin.product.delete', $product->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onClick=> <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
{{-- Script cho CKEditor --}}
<script>
ClassicEditor
    .create(document.querySelector('#description_editor'))
    .catch(error => {
        console.error(error);
    });
</script>

{{-- Script xem trước ảnh --}}
<script>
document.getElementById('imageInput').addEventListener('change', function(event) {
    const [file] = event.target.files;
    if (file) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(file);
        imagePreview.style.display = 'block';
    }
});
</script>
@endpush