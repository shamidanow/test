@extends('weathers/layout')

@section('content')
	<h1 class="title">Погода</h1>
	<table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <th>Город</th>
            <th>Дата</th>
            <th>Явления погоды</th>
            <th>Температура</th>
            <th>Прогноз</th>
        </tr>
        @foreach ($weathers as $weather)
        <tr>
            <td><a href="/weathers/{{ $weather->id }}/edit" title="Редактировать">{{ $weather->getCityById($weather->city_id)->name }}</a></td>
            <td>{{ $weather->date }}</td>
            <td>{{ $weather->precipitation }}</td>
            <td>{{ $weather->temperature }}</td>
            <td><a href="/weathers/callapi/{{ $weather->getCityById($weather->city_id)->api_id }}/{{ $weather->city_id }}" title="Открыть прогноз">Подробнее</a></td>
        </tr>
        @endforeach
    </table>
    
    <form method="LINK" action="/weathers/create">
        <input type="submit" class="button is-link" value="Create New Weather">
    </form>
@endsection