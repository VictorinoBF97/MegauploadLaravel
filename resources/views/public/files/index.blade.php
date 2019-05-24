@extends('layouts.app')

@section('title', 'MEGAUPLOAD List')

@section('content')
<!-- Listado de archivos -->
<h1>Archivos subidos</h1>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>

    @forelse($files as $file)
    <div class="card mb-2 border-secondary">
        <div class="card-header bg-dark text-light">
            <h5>{{ $file->name }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <img class="img-thumbnail mx-auto" src="{{ $file->archivo }}" alt="">
                </div>
                <div class="col">
                    <h5 class="card-title">Usuario: <a href="{{ route('userfiles.index', $file->user->slug) }}" title="{{ $file->user->name }}'s file list">{{ $file->user->name }}</a></h5>
                    <p class="card-text"><h5>Descripción:</h5>{{ str_limit($file->description, 300) }}</p>

                    @include('public.files.partials.buttons')

                    <a href="/files/{{ $file->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>
                </div>
            </div>
      </div>
    </div>
    @empty
      <p>No hay archivos</p>
    @endforelse

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>
@endsection