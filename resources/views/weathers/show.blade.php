@extends('weathers/layout')

@section('content')
	<h1 class="title">Погода в городе: {{ $weather->getCityById($weather->city_id)->name }}</h1>
	
	<div class="content">
		city_id: {{ $weather->city_id }}
	</div>
	
	<div class="content">
		date: {{ $weather->date }}
	</div>
	
	<div class="content">
		precipitation: {{ $weather->precipitation }}
	</div>
	
	<div class="content">
		temperature: {{ $weather->temperature }}
	</div>
	
	<p>
		<a href="/weathers/{{ $weather->id }}/edit">Редактировать</a>
	</p>
@endsection
