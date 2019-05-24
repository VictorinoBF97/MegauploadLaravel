@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un link de verificación a tu correo electrónico') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor revisa tu correo electrónico para verificar el e-mail') }}
                    {{ __('Si no ha recibido aún el e-mail de verificación') }}, <a href="{{ route('verification.resend') }}">{{ __('clickea aquí para volver a enviar') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
