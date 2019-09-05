@extends('weathers/layout')

@section('content')
	<h1 class="title">Погода в городе: {{ $city->name }}</h1>
	<table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <th>Дата и время</th>
            <th>Температура</th>
            <th>Описание</th>
        </tr>
        @foreach ($values as $value)
        <tr>
            <td>{{ $value->dt_txt }}</td>
            <td>{{ $value->main->temp }}</td>
            <td><img src="http://openweathermap.org/img/wn/{{ $value->weather[0]->icon }}@2x.png">{{ $value->weather[0]->description }}</td>
        </tr>
        @endforeach
    </table>
@endsection