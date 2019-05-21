@extends('public.layout')

@section('title', 'MEGAUPLOAD')

@section('content')
<h1>Archivos subidos</h1>
    @forelse($files as $file)
    <div class="card mb-2">
        <div class="card-header">
            {{ $file->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $file->user_id }}</h5>
            <p class="card-text">{{ str_limit($file->description, 300) }}</p>

            <form action="/files/{{ $file->id }}" method="post" class="mr-2 float-right">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">Borrar Archivo</button>
            </form>
            <a href="/files/{{ $file->slug }}" class="btn btn-primary btn-sm mr-2 float-right">Más info</a>
            <a href="/files/{{ $file->id }}/edit" class="btn btn-warning btn-sm mr-2     float-right">Editar</a>

      </div>
    </div>
    @empty
      <p>No hay archivos</p>
    @endforelse
@endsection