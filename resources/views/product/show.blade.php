<!-- resources/views/products/show.blade.php -->

@extends('welcome')

@section('main')
<main>
    <div class="container" style="margin-left: 250px; margin-top: 80px;">
        <h1>Product Details</h1>

        <div class="card">
            <div class="card-header">
                <h5>{{ $product->name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <div class="mb-3">
                    @if($product->photo)
                        <img src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->name }}" width="300">
                    @else
                        No photo available
                    @endif
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</main>
@endsection
