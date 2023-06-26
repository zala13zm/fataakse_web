<!-- resources/views/products/create.blade.php -->

@extends('welcome')

@section('main')
<main>
    <div class="container" style="
    margin-left: 250px;
    margin-top: 80px;
">
        <h1>Create Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    </main>
@endsection
