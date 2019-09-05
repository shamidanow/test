@extends('weathers/layout')

@section('content')
	<h1 class="title">Create a new weather</h1>
	
	<form method="post" action="/weathers">
		{{ csrf_field() }}
		
		<div><input type="text" class="input {{ $errors->has('city_id') ? 'is-danger' : '' }}" name="city_id" value="{{ old('city_id') }}" placeholder="Weather city_id"></div>
		
		<div><input type="date" class="input {{ $errors->has('date') ? 'is-danger' : '' }}" name="date" value="{{ old('date') }}" placeholder="Weather date"></div>
		
		<div><input type="text" class="input {{ $errors->has('precipitation') ? 'is-danger' : '' }}" name="precipitation" value="{{ old('precipitation') }}" placeholder="Weather precipitation"></div>
		
		<div><input type="text" class="input {{ $errors->has('temperature') ? 'is-danger' : '' }}" name="temperature" value="{{ old('temperature') }}" placeholder="Weather temperature"></div>
		
		<div>
			<button type="submit" class="button is-link">Create Weather</button>
		</div>
		
		@include('errors')
	</form>
@endsection
