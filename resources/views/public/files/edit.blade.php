@extends('public.layout')

@section('title', 'Edit file')

@section('content')
<form action="/files/{{ $file->id }}" method="post" novalidate>

    @csrf
    @method('patch')

    @include('public.files.partials.form')

    <button type="submit" class="btn btn-primary">Guardar archivo</button>
</form>
@endsection