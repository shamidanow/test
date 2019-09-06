@extends('weathers/layout')

@section('content')
	<h1 class="title">Edit Weather</h1>
	<form method="POST" action="/weathers/{{ $weather->id }}" style="margin-bottom: lem;">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}
		
		<div class="field">
			<label class="label" for="city_id">city_id</label>
			
			<div class="control">
				<input type="text" class="input" name="city_id" placeholder="Weather city_id" value="{{ $weather->city_id }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="date">date</label>
			
			<div class="control">
				<input type="date" class="input" name="date" placeholder="Weather date" value="{{ $weather->date }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="precipitation">precipitation</label>
			
			<div class="control">
				<input type="text" class="input" name="precipitation" placeholder="Weather precipitation" value="{{ $weather->precipitation }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="temperature">temperature</label>
			
			<div class="control">
				<input type="text" class="input" name="temperature" placeholder="Weather temperature" value="{{ $weather->temperature }}">
			</div>
		</div>
		
		<div class="field">
    		<div class="control">
    			<button type="submit" class="button is-link">Update Weather</button>
    		</div>
		</div>
	</form>
	
	@include('errors')
	
	<form method="POST" action="/weathers/{{ $weather->id }}" style="margin-bottom: lem;">
		@method('DELETE')
		@csrf
		
		<div class="field">
    		<div class="control">
    			<button type="submit" class="button">Delete Weather</button>
    		</div>
		</div>
	</form>
@endsection