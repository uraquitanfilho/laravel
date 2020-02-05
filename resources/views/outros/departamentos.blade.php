@extends('layouts.principal')
@section('titulo', "Departamentos")
@section('content')
<h3>Departamentos</h3>
<ul>
    <li>Presidência</li>
    <li>Financeiro</li>
    <li>RH</li>
</ul>

@component('components.alert', ["titulo" => "Erro Fatal", "tipo" => "error"])
  <p>Ocorreu um problema</p>
@endcomponent


@alerta( ["titulo" => "Erro Fatal", "tipo" => "success"])
  <p>Ocorreu um problema</p>
@endalerta


@endsection
