@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR USUARIO</h1>
@stop

@section('content')
    <form action="{{ route('editUser', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <h2>Nombre: </h1>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>
        <div class="form-group">
            <h2>Email: </h1>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control">
        </div>
        <div>
            <button type="submit">Editar</button>
        </div>
    </form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop