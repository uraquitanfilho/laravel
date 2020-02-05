@extends('layouts.principal')
@section('titulo', "Information")
@section('content')
<h3>Information</h3>

<p>ID: {{$cliente['id']}}</p>
<p>Name: {{$cliente['nome']}}</p>
<br/>
<a href="{{route('clientes.index')}}">Voltar</a>
@endsection
