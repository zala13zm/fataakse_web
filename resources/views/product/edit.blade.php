<!-- resources/views/products/edit.blade.php -->

@extends('welcome')

@section('main')
<main >
    <div class="container" style="margin-left: 250px; margin-top: 80px;">
        <h1>Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required>{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo" class="form-control-file">
            </div>

            <div class="form-group">
                <label>Current Photo:</label>
                @if($product->photo)
                    <img src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->name }}" width="200">
                @else
                    No photo available
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</main>
@endsection
