@extends('layouts.app')

@section('title', 'File Info')
<!-- Mostrar información del archivo mediante una vista aislada-->
@section('content')
<div class="card" style="width: 20rem;">
  <img class="img-thumbnail" src="{{ $file->archivo }}" alt="">
  <div class="card-body">
    <h4 class="card-title">{{ $file->name }}</h4>
    <p class="card-text">{{ $file->description }}</p>
  </div>
</div>
    
@endsection

<!--<h2>{{ $file->name }}</h2>
    <p>{{ $file->description }}</p>
    <div class="col-2">
        <img class="rounded mx-auto d-block" src="{{ $file->archivo }}" alt="">
</div>-->