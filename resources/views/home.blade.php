@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">
	<div class="card" style="width: 50%; margin-bottom: 40px;">
		<img src="https://i2.wp.com/www.techjaja.com/wp-content/uploads/2018/07/gadgets.jpeg?fit=1880%2C1015&ssl=1" class="card-img-top" alt="collection of tech gadgets">
		<div class="card-body">
			<h5 class="card-title">Produkter</h5>
			<p class="card-text">Coola prylar med recensioner, bilder och var man kan köpa dessa</p>
			<a href="{{ route('products.index') }}" class="btn btn-primary">Visa Produkter</a>
		</div>
	</div>
	<div class="card" style="width: 50%; margin-bottom: 40px;">
		<img src="https://searchengineland.com/figz/wp-content/seloads/2017/01/reviews-ratings-stars-mobile-smartphone-ss-1920-800x450.jpg" class="card-img-top" alt="user is entering a review">
		<div class="card-body">
			<h5 class="card-title">Recensioner</h5>
			<p class="card-text">Hoppa direkt till vår samling av recensioner och bli prylexpert</p>
			<a href="{{ route('reviews.index') }}" class="btn btn-primary">Visa Recensioner</a>
		</div>
	</div>
	<div class="card" style="width: 50%; margin-bottom: 40px;">
		<img src="https://secure.i.telegraph.co.uk/multimedia/archive/02173/high-street_2173351b.jpg" class="card-img-top" alt="streetview of storefronts">
		<div class="card-body">
			<h5 class="card-title">Butiker</h5>
			<p class="card-text">Vi listar upp alla butiker åt dig och ger dig en överblick</p>
			<a href="{{ route('stores.index') }}" class="btn btn-primary">Visa Butiker</a>
		</div>
	</div>
</div>
@endsection