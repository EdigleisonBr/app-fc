@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- @foreach ($arrayDelete as $item)
<p>deletados: {{$item}}</p>
@endforeach --}}


<p>{{$goals}}</p>

@foreach ($soccer as $ss)
<p>{{$ss->id}}</p>
@endforeach



@endsection