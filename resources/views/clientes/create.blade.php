@extends('layouts.principal')
@section('titulo', "New Client")
@section('content')

<h3>New Client</h3>
<form action="{{route('clientes.store')}}" method="post">
  @csrf
  <input type="text" name="nome" />
  <input type="submit" value="Save" />
</form>
@endsection
