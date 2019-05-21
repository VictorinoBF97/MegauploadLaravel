@extends('public.layout')

@section('title', 'New file')

@section('content')
<form action="/files" method="post" novalidate>

    @csrf

    @include('public.files.partials.form')

    <button type="submit" class="btn btn-primary">Guardar archivo</button>
</form>
@endsection