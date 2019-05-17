@extends('layouts.app')

@section('content')
<div class="card mt-4">
  <div class="card-body d-flex justify-content-between align-items-center">
    <div>
      <h3 class="card-title">{{$store->name}}</h3>
      <h4>{{$store->city}}</h4>
    </div>
    <a class="btn btn-primary float-right" href="{{ route('stores.edit', ['store' => $store->id]) }}">Ändra butik</a>
  </div>
</div>
<div class="card card-outline-secondary my-4">
  <div class="card-header">
    Produkter
  </div>
  <div class="card-body">
    @foreach ($store->products as $product)
    <div class="d-flex justify-content-between align-items-center">
      <p><strong>{{$product->title}}</strong> {{$product->brand}}</p>
      <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-success">Visa produkt</a>
    </div>
    <hr>
    @endforeach
  </div>
</div>
@endsection