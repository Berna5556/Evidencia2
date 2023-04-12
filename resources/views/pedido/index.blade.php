@extends('layouts.app')
@section('content')
<div class="container">

<a href="{{ url('pedido/create') }}">Registrar nuevo pedido</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Id Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $pedidos as $pedido )
        <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->id_producto }}</td>
            <td>{{ $pedido->cantidad }}</td>
            @foreach( $productos as $producto )
            <td>
                @if ($producto->id == $pedido->id_producto)
                    {{ $producto->precio }}
                @endif
            </td>
            <td>
                @if ($producto->id == $pedido->id_producto)
                    {{ $producto->precio * $pedido->cantidad }}
                @endif
            </td>
            @endforeach
            <td>{{ $pedido->estatus }}</td>
            <td>

            <a href="{{ url('/pedido/'.$pedido->id.'/edit' ) }}">
                Editar
            </a>
             | 

             <form action="{{ url('/pedido/'.$pedido->id ) }}" method="post">
             @csrf
             {{ method_field('DELETE') }}
             <input type="submit" onclick="return confirm('Quieres borrar?')" value="Borrar">

             </form>

             </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

</div>
@endsection