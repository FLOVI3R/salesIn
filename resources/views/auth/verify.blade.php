@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificar Usuario') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un mail de verificación a su dirección de correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Para proceder debe confirmar su dirección de correo electrónico con el enlace que le hemos enviado.') }}
                    {{ __('Si no ha recibido el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Haga click aqui para reenviar uno nuevo.') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
