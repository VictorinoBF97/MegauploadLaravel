@extends('layouts.app')

@section('title', 'New file')

<!-- Vista de la creación de un nuevo archivo en la aplicación -->
@section('content')
<form action="/files" method="post" enctype="multipart/form-data" novalidate>

    @csrf

    @include('public.files.partials.form')

    <button type="submit" class="btn btn-dark">Subir archivo</button>
</form>
@endsection