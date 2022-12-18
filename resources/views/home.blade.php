@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Página Principal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->actived == 0)
                    Para poder continuar utilizando la aplicación deberá esperar a que un administrador le active la cuenta.
                    @else
                    Cuenta Activada
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
