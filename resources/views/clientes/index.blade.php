@extends('layouts.principal')
@section('titulo', "Clientes")
@section('content')
<h3>{{$title}}</h3>
<a href="{{ route('clientes.create') }}">Novo Cliente</a>

@if(count($clientes) > 0)
<ul>
    @foreach ($clientes as $item)
       <li> {{$item["id"]}} | {{$item["nome"]}}</li> |
       <a href="{{ route('clientes.edit', $item['id']) }}">Edit</a> |
       <a href="{{ route('clientes.show', $item['id']) }}">Show</a> |
       <form action="{{route('clientes.destroy', $item['id'])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" />
      </form>
    @endforeach
</ul>
<hr/>

@foreach ($clientes as $c)
  {{$c['nome']}} |
  @if ($loop->first)
    (first) |
  @endif
  @if($loop->last)
    (last) |
  @endif
  ({{$loop->index}}) - {{ $loop->iteration }} / {{$loop->count }}
@endforeach


@else
  <h4>Não existem clientes cadastrados...</h4>
@endif

@empty($clientes)
   <h4>empty, outra maneira: Não existem clientes cadastrados...</h4>
@endempty

@endsection
