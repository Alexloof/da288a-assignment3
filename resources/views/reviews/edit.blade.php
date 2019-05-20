@extends('layouts.app')

@section('content')
<h1>Ändra Recension</h1>
<form action="{{ route('reviews.update', ['review' => $review->id]) }}" method="POST">
  @csrf
  @method('PUT')
  <p><strong>{{$review->product->title}}</strong> - {{ $review->product->brand }}</p>
  <div class="form-group">
    <label for="userName">Ditt namn</label>
    <input id="userName" type="text" name="name" value="{{ $review->name }}" class="form-control" placeholder="Ange ditt namn" required></input>
  </div>
  <div class="form-group">
    <label for="productName">Recension</label>
    <textarea id="productName" type="text" name="comment" class="form-control" placeholder="Ange produktnamn" required>{{$review->comment}}</textarea>
  </div>
  <div class="form-group">
    <label for="gradeSelect">Betyg</label>
    <select class="custom-select mr-sm-2" id="gradeSelect" name="grade[]">
      <option value="1" <?php if ($review->grade == 1) echo 'selected' ?>>1</option>
      <option value="2" <?php if ($review->grade == 2) echo 'selected' ?>>2</option>
      <option value="3" <?php if ($review->grade == 3) echo 'selected' ?>>3</option>
      <option value="4" <?php if ($review->grade == 4) echo 'selected' ?>>4</option>
      <option value="5" <?php if ($review->grade == 5) echo 'selected' ?>>5</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Ändra recension</button>
</form>
<form class="float-right" action="{{ route('reviews.destroy', ['review' => $review->id]) }}" method="POST">
  @csrf
  @method('DELETE')
  <input type="submit" class="btn btn-danger" value="Radera">
</form>
@endsection