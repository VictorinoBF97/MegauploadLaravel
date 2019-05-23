@extends('layouts.app')

@section('title', 'About IBDB')

@section('content')
<h1>{{ $user->name }}'s Files List</h1>

    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>

    @forelse($files as $file)
    <div class="card mb-2">
        <div class="card-header">
            {{ $file->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $file->user->name }}</h5>
            <p class="card-text">{{ str_limit($file->description, 300) }}</p>


            @auth
            <a href="/files/{{ $file->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Edit</a>
            <form action="/files/{{ $file->id }}" method="post" class="mr-2 float-right">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">Delete File</button>
            </form>
            @endauth
            <a href="/files/{{ $file->name }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>
      </div>
    </div>
    @empty
      <p>No hay archivos</p>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>
@endsection