@extends('layouts.app')

@section('content')
<h1>Skapa Produkt</h1>
<form action="{{ route('products.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="productName">Produktnamn</label>
    <input id="productName" type="text" name="title" class="form-control" placeholder="Ange produktnamn" required>
  </div>
  <div class="form-group">
    <label for="productDesc">Beskrivning</label>
    <textarea id="productDesc" name="description" class="form-control" placeholder="Ange produktbeskrivning" required></textarea>
  </div>
  <div class="form-group">
    <label for="productBrand">Märke</label>
    <input id="productBrand" type="text" name="brand" class="form-control" placeholder="Ange märke" required>
  </div>
  <div class="form-group">
    <label for="productPrice">Pris</label>
    <input id="productPrice" type="number" name="price" class="form-control" placeholder="Ange pris" required>
  </div>
  <div class="form-group">
    <label for="productImage">Bild URL</label>
    <input id="productImage" type="text" name="image" class="form-control" placeholder="Ange bild URL" required>
  </div>
  @foreach ($stores as $store)
  <div class="checkbox">
    <label><input type="checkbox" name="stores[]" value="{{$store->id}}"> {{$store->name}} - {{$store->city}} </label>
  </div>
  @endforeach
  <button type="submit" class="btn btn-primary">Skapa produkt</button>
</form>
@endsection