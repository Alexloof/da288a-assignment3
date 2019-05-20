@extends('layouts.app')

@section('content')
<div class="card mt-4">
    <img class="card-img-top img-fluid" style="max-height: 500px; object-fit: contain;" src="{{$product->image}}" alt="{{$product->title}}">
    <div class="card-body">
        <h3 class="card-title">{{$product->title}}</h3>
        <h4>{{$product->price}} kr</h4>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text"><small class="text-muted">{{$product->brand}}</small></p>
        <a class="btn btn-primary float-right" href="{{ route('products.edit', ['product' => $product->id]) }}">Ändra produkt</a>
    </div>
</div>
<!-- /.card -->

<div class="card card-outline-secondary my-4">
    <div class="card-header">
        Product Reviews
    </div>
    <div class="card-body">
        @foreach ($product->reviews as $review)
        <p>{{$review->comment}}</p>
        <small class="text-muted">Posted by {{$review->name}}</small>
        <span class="text-warning">{{str_repeat("★", $review->grade)}}</span>
        <hr>
        @endforeach
        <a href="{{ route('reviews.create', ['products' => $product->id]) }}" class="btn btn-success">Leave a Review</a>
    </div>
</div>
<!-- /.card -->

@endsection