@auth
@can('touch', $file)
<a href="/files/{{ $file->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Editar Archivo</a>
<form action="/files/{{ $file->id }}" method="post" class="mr-2 float-right">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">Borrar Archivo</button>
</form>
@endcan
@endauth