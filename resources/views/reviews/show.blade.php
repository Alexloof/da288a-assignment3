@extends('layouts.app')

@section('content')
<div class="card mt-4">
  <div class="card-body d-flex justify-content-between align-items-center">
    <div>
      <h3 class="card-title">{{$review->product->title}}</h3>
      <h4>{{$review->product->brand}}</h4>
      <small class="text-muted">Posted by {{$review->name}}</small>
      <span class="text-warning">{{str_repeat("★", $review->grade)}}</span>
    </div>
    @auth
    <a class="btn btn-primary float-right" href="{{ route('reviews.edit', ['review' => $review->id]) }}">Ändra recension</a>
    @endauth
  </div>
</div>
@endsection