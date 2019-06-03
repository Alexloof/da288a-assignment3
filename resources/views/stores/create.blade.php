@extends('layouts.app')

@section('content')
<h1>Skapa Butik</h1>
<form action="{{ route('stores.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="storeName">Butiksnamn</label>
    <input id="storeName" type="text" name="name" class="form-control" placeholder="Ange butiksnamn" required>
  </div>
  <div class="form-group">
    <label for="storeCity">Stad</label>
    <input type="text" name="city" class="form-control" placeholder="Ange stad" required>
  </div>
  <button type="submit" class="btn btn-primary">Skapa butik</button>
</form>
@endsection