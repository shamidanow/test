@extends('weathers/layout')

@section('content')
	<h1 class="title">Create a new weather</h1>
	
	<form method="post" action="/weathers">
		{{ csrf_field() }}
		
		<div><input type="text" class="input" name="city_id" placeholder="Weather city_id"></div>
		
		<div><input type="date" class="input" name="date" placeholder="Weather date"></div>
		
		<div><input type="text" class="input" name="precipitation" placeholder="Weather precipitation"></div>
		
		<div><input type="text" class="input" name="temperature" placeholder="Weather temperature"></div>
		
		<div>
			<button type="submit" class="button is-link">Create Weather</button>
		</div>
	</form>
@endsection
