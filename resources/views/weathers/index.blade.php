@extends('weathers/layout')

@section('content')
	<h1 class="title">Погода</h1>
	<table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <th>Город</th>
            <th>Дата</th>
            <th>Явления погоды</th>
            <th>Температура</th>
        </tr>
        @foreach ($weathers as $weather)
        <tr>
            <td><a href="/weathers/{{ $weather->id }}/edit">{{ $weather->getCityById($weather->city_id)->name }}</a></td>
            <td>{{ $weather->date }}</td>
            <td>{{ $weather->precipitation }}</td>
            <td>{{ $weather->temperature }}</td>
        </tr>
        @endforeach
    </table>
    
    <form method="LINK" action="/weathers/create">
        <input type="submit" class="button is-link" value="Create New Weather">
    </form>
@endsection