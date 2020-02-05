@extends('layouts.principal')
@section('titulo', "Edit Client")
@section('content')

<h3>Client Edit</h3>

<form action="{{route('clientes.update', $cliente['id'])}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nome" value="{{$cliente['nome']}}" />
    <input type="submit" value="Update" />
 </form>
 @endsection
