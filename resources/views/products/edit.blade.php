@extends('layouts.app')

@section('content')
<h1>Ändra Produkt</h1>
<form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="productName">Produktnamn</label>
    <input id="productName" type="text" name="title" value="{{$product->title}}" class="form-control" placeholder="Ange produktnamn" required>
  </div>
  <div class="form-group">
    <label for="productDesc">Beskrivning</label>
    <textarea id="productDesc" name="description" class="form-control" placeholder="Ange produktbeskrivning" required>{{$product->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="productBrand">Märke</label>
    <input id="productBrand" type="text" name="brand" value="{{$product->brand}}" class="form-control" placeholder="Ange märke" required>
  </div>
  <div class="form-group">
    <label for="productPrice">Pris</label>
    <input id="productPrice" type="number" name="price" value="{{$product->price}}" class="form-control" placeholder="Ange pris" required>
  </div>
  <div class="form-group">
    <label for="productImage">Bild URL</label>
    <input id="productImage" type="text" name="image" value="{{$product->image}}" class="form-control" placeholder="Ange bild URL" required>
  </div>
  @foreach ($stores as $store)
  <div class="checkbox">
    <label><input type="checkbox" name="stores[]" <?php if (in_array($store->id, $product->storesId)) echo 'checked' ?> value="{{$store->id}}"> {{$store->name}} - {{$store->city}} </label>
  </div>
  @endforeach
  <button type="submit" class="btn btn-primary">Ändra produkt</button>
</form>
<form class="float-right" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
  @csrf
  @method('DELETE')
  <input type="submit" class="btn btn-danger" value="Radera">
</form>
@endsection