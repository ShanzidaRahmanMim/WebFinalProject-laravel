@extends('user_template.layouts.template') 
@section('main-content')
<div class="container">
    <h1>Search Results for "{{ $query }}"</h1>

    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ $product->product_img }}" alt="{{ $product->product_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">{{ $product->product_short_des }}</p>
                            <p class="card-text">${{ $product->price }}</p>
                            <a href="{{ route('products_show', $product->slug) }}" class="btn btn-warning">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection