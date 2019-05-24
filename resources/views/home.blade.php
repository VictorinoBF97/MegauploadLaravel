@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tablón de notificaciones</div>

                <div class="card-body">
                    <h3>Registro</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡Se ha realizado el registrado con éxito!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
