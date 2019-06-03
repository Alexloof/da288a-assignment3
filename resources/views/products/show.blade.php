@extends('layouts.app')

@section('content')
<div class="card mt-4">
    <img class="card-img-top img-fluid" style="max-height: 500px; object-fit: contain;" src="{{$product->image}}" alt="{{$product->title}}">
    <div class="card-body">
        <h3 class="card-title">{{$product->title}}</h3>
        <h4>{{$product->price}} kr</h4>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text"><small class="text-muted">{{$product->brand}}</small></p>
        @auth
        <a class="btn btn-primary float-right" href="{{ route('products.edit', ['product' => $product->id]) }}">Ändra produkt</a>
        @endauth
    </div>
</div>

<div class="card card-outline-secondary my-4">
    <div class="card-header">
        Finns i butikerna
    </div>
    <div class="card-body">
        @foreach ($product->stores as $store)
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p>{{$store->name}}</p>
                <small class="text-muted">{{$store->city}}</small>
            </div>
            <div>
                @auth
                <a class="btn btn-secondary" href="{{ route('stores.edit', ['store' => $store->id]) }}">Ändra</a>
                @endauth
                <a class="btn btn-primary" href="{{ route('stores.show', ['store' => $store->id]) }}">Visa</a>
            </div>
        </div>

        <hr>
        @endforeach

    </div>
</div>

<div class="card card-outline-secondary my-4">
    <div class="card-header">
        Recensioner
    </div>
    <div class="card-body">
        @foreach ($product->reviews as $review)
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p>{{$review->comment}}</p>
                <small class="text-muted">Posted by {{$review->name}}</small>
                <span class="text-warning">{{str_repeat("★", $review->grade)}}</span>
            </div>
            <div>
                @auth
                <a class="btn btn-secondary" href="{{ route('reviews.edit', ['review' => $review->id]) }}">Ändra</a>
                @endauth
                <a class="btn btn-primary" href="{{ route('reviews.show', ['review' => $review->id]) }}">Visa</a>
            </div>
        </div>

        <hr>
        @endforeach
        @auth
        <a href="{{ route('reviews.create', ['productId' => $product->id]) }}" class="btn btn-success">Leave a Review</a>
        @endauth
    </div>
</div>

@endsection