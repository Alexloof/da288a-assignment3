@extends('layouts.app')

@section('content')
<h1>Alla recensioner</h1>
<div class="card card-outline-secondary my-4">
  <div class="card-body">
    @foreach ($reviews as $review)
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <p><strong>{{$review->product->title}}</strong> - {{$review->product->brand}}</p>
        <p>{{$review->comment}}</p>
        <small class="text-muted">Posted by {{$review->name}}</small>
        <span class="text-warning">{{str_repeat("★", $review->grade)}}</span>
      </div>
      <a class="btn btn-primary" href="{{ route('reviews.edit', ['review' => $review->id]) }}">Ändra</a>
    </div>
    <hr>
    @endforeach
  </div>
</div>
@endsection