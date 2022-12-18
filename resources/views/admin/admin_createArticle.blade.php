@extends('adminlte::page')

@section('title', 'CREAR NOTICIA')

@section('content_header')
    <h1>CREAR NOTICIA</h1>
@stop

@section('content')
    <form action="{{ route('addArticle') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <h2>Título: </h1>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <h2>Descripción: </h1>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <h2>Imagen: </h1>
            <input type="text" name="image" class="form-control" required>
        </div>
        <div>
            <button type="submit" class="btn-outline-primary btn-sm show_confirm">Crear Noticia</button>
        </div>
    </form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Confirmación para crear noticia`,
              text: "Va a crear una noticia  y añadirla a la base de datos. ¿Está seguro de querer editar esta noticia?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willUpdate) => {
            if (willUpdate) {
              form.submit();
            }
          });
      });
  
</script>
@stop