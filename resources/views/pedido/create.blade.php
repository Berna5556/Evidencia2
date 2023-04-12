@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/pedido') }}" method="post" enctype="multipart/form-data">
@csrf
@include('pedido.form')

</div>
@endsection