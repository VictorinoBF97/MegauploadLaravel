@extends('layouts.app')

@section('title', 'File Info')

@section('content')
    <h2>{{ $file->name }}</h2>
    <p>{{ $file->description }}</p>
@endsection