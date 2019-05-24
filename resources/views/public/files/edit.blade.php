@extends('layouts.app')

@section('title', 'Edit file')

<!-- Vista del edit de los archivos -->
@section('content')
<h1>Editar archivo</h1>
<form action="/files/{{ $file->id }}" method="post" enctype="multipart/form-data" novalidate>

    @csrf
    @method('patch')

    @include('public.files.partials.form')

    <button type="submit" class="btn btn-primary">Editar archivo</button>
</form>
@endsection