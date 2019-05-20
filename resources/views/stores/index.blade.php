@extends('layouts.app')

@section('content')
<h3>Butiker</h3>
<div class="card">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Butiksnamn</th>
        <th scope="col">Stad</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($stores as $store)
      <tr>
        <th scope="row">{{$store->id}}</th>
        <td>{{$store->name}}</td>
        <td>{{$store->city}}</td>
        <td>
          <a class="btn btn-primary float-right" href="{{ route('stores.show', ['stores' => $store->id]) }}">Visa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@auth
<div class="py-2">
  <a class="btn btn-primary" href="{{ route('stores.create') }}">Lägg till butik</a>
</div>
@endauth

@endsection