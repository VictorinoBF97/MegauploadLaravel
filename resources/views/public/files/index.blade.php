@extends('layouts.app')

@section('title', 'MEGAUPLOAD List')

@section('content')
<h1>Lista de Archivos</h1>

    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>

    @forelse($files as $file)
    <div class="card mb-2">
        <div class="card-header">
            {{ $file->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('userfiles.index', $file->user->name) }}" title="{{ $file->user->name }}'s file list">{{ $file->user->name }}</a></h5>
            <p class="card-text">{{ str_limit($file->description, 300) }}</p>


            @auth
            <a href="/files/{{ $file->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Editar</a>
            <form action="/files/{{ $file->id }}" method="post" class="mr-2 float-right">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">Borrar Archivo</button>
            </form>
            @endauth
            <a href="/files/{{ $file->name }}" class="btn btn-primary btn-sm mr-2 float-right">Más Info</a>
      </div>
    </div>
    @empty
      <p>No hay archivos</p>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>
@endsection