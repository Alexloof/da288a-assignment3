@extends('layouts.app')

@section('content')
<h1>Skapa Recension</h1>
<form action="{{ route('reviews.store', ['productId' => $product->id]) }}" method="POST">
  @csrf
  <p><strong>{{$product->title}}</strong> - {{$product->brand}}</p>
  <div class="form-group">
    <label for="userName">Ditt namn</label>
    <input id="userName" type="text" name="name" class="form-control" placeholder="Ange ditt namn" required></input>
  </div>
  <div class="form-group">
    <label for="productName">Recension</label>
    <textarea id="productName" type="text" name="comment" class="form-control" placeholder="Ange produktnamn" required></textarea>
  </div>
  <div class="form-group">
    <label for="gradeSelect">Betyg</label>
    <select class="custom-select mr-sm-2" id="gradeSelect" name="grade[]">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5" selected>5</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Spara</button>
</form>
@endsection