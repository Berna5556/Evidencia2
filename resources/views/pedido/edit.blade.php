@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/pedido/'.$pedido->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('pedido.form')

</form>
</div>
@endsection