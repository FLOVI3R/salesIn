@extends('adminlte::page')

@section('title', 'NOTICIAS')

@section('content_header')
    <h1>MENÚ DE NOTICIAS</h1>
@stop

@section('content')
<div class="card-body p-0">
<div>
    <a href="createArticle">Crear Noticia</a>
</div>
<table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th style="width: 200px">TÍTULO</th>
                    <th style="width: 200px">DESCRIPCIÓN</th>
                    <th style="width: 500px">IMAGEN</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ $article->image }}</td>
                    <td>
                    <form action="{{ route('updateArticle', $article->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-block btn-outline-secondary btn-sm">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('deleteArticle', $article->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block btn-outline-danger btn-sm show_confirm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop