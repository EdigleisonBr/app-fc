@extends('layouts.app')

@section('title', 'Agendas')

@section('content')

@include('sweetalert::alert')
<h1>{{$soccerMatches}} - {{$goals}}</h1>
   
@endsection









