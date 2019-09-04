@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
    <ul>
    	<li><a href="/weathers">Weather</a></li>
    </ul>
@stop