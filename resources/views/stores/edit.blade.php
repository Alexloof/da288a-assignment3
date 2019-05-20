@extends('layouts.app')

@section('content')
<h1>Ändra Butik</h1>
<form action="{{ route('stores.update', ['store' => $store->id]) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="storeName">Butiksnamn</label>
    <input id="storeName" type="text" name="name" class="form-control" placeholder="Ange butiksnamn" value="{{ $store->name }}" required>
  </div>
  <div class="form-group">
    <label for="storeCity">Stad</label>
    <input type="text" name="city" class="form-control" placeholder="Ange stad" value="{{ $store->city }}" required>
  </div>
  <div class="form-group">
    <label for="productImage">Produkter</label>
    @foreach ($products as $product)
    <div class="checkbox">
      <label><input type="checkbox" name="products[]" <?php if (in_array($product->id, $store->productsId)) echo 'checked' ?> value="{{$product->id}}"> {{$product->title}} - {{$product->brand}} </label>
    </div>
    @endforeach
  </div>

  <button type="submit" class="btn btn-primary">Uppdatera butik</button>
</form>
<form class="float-right" action="{{ route('stores.destroy', ['store' => $store->id]) }}" method="POST">
  @csrf
  @method('DELETE')
  <input type="submit" class="btn btn-danger" value="Radera">
</form>
@endsection