@extends('layouts.app')

@section('content')
@foreach ($products as $product)
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4 d-flex align-items-center">
      <img src="{{$product->image}}" class="card-img" alt="{{$product->title}}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text"><small class="text-muted">{{$product->brand}}</small></p>
        <p class="card-text">{{$product->price}} kr</p>
        <a class="btn btn-primary" href="{{ route('products.show', ['products' => $product->id]) }}">Visa</a>
      </div>
    </div>
  </div>
</div>
@endforeach
@auth
<div class="py-2">
  <a class="btn btn-primary" href="{{ route('products.create') }}">Lägg till produkt</a>
</div>
@endauth
@endsection