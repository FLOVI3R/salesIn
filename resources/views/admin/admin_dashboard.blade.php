@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>MENÚ DE ACTIVACIÓN</h1>
@stop

@section('content')
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">|</th>
                    <th style="width: 300px">NOMBRE</th>
                    <th style="width: 500px">EMAIL</th>
                    <th style="width: 100px"></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->actived === 0)
                            <form action="{{ route('activateUser', $user->id) }}" method="POST">   
                            @csrf    
                            <button type="submit" class="btn btn-block btn-outline-primary btn-sm">Activar</button>
                            </form>
                        @else
                            <form action="{{ route('deactivateUser', $user->id) }}" method="POST">   
                            @csrf    
                            <button type="submit" class="btn btn-block btn-outline-danger btn-sm">Desactivar</button>
                            </form>
                        @endif 
                    </td>
                    <td>
                    <form action="{{ route('updateUser', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block btn-outline-secondary btn-sm">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block btn-outline-danger btn-sm" onclick="confirm('¿Está seguro que querer eliminar este usuario de la base de datos?') || event.stopImmediatePropagation()" wire:click="deleteUser">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop