<!-- resources/views/products/index.blade.php -->

@extends('welcome')

@section('main')
<main>
    <div class="container" style="margin-left: 250px; margin-top: 80px;">
        <h1>Products</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Available Qty</th>
                    <th>Deliverable</th>
                    <th>Is Active</th>
                    <th>Vendor ID</th>
                    <th>In Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @if($product->photo)
                                <img src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->name }}" width="100">
                            @else
                                No photo available
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                        <td>{{ $product->deliverable }}</td>
                        <td>{{ $product->is_active }}</td>
                        <td>{{ $product->vendor_id }}</td>
                        <td>{{ $product->in_order }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
