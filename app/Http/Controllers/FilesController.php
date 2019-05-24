<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;

class FilesController extends Controller
{
    /**
     * Permisos de autorización de modificación del elemento clave de la aplicación medianto una policy
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);

        $this->middleware('can:touch,file',[
            'only' => ['edit','update','destroy']
        ]);
    }
    /**
     * Paginación de la lista de archivos presentes en la página de inicio de la aplicación
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Archivo::paginate(10);

        return view('public.files.index')->withFiles($files);
    }

    /**
     * Subida de un nuevo archivo
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.files.create');
    }

    /**
     * Creación del archivo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {
        $archivo = $request->file('archivo');

        Archivo::create([
            'user_id' => $request->user()->id,
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'description' => request('description'),
            'archivo' => $archivo->store('archivos','public'),
        ]);
       
        return redirect('/');
    }

    /**
     * Muestra la información del archivo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $file = Archivo::where('slug', $slug)->firstOrFail();

        return view('public.files.show', ['file' => $file]);
    }

    /**
     * Edit de los archivos en la aplicación
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $file)
    {
        return view('public.files.edit', ['file' => $file]);
    }

    /**
     * Update del edit del archivo
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request,Archivo $file)
    {
        $archivo = $request->file('archivo');

        $file->update([
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'description' => request('description'),
            'archivo' => $archivo->store('archivos','public'),
        ]);

        return redirect('/files/'.$file->slug);
    }

    /**
     * Función para eliminar un archivo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $file)
    {
        $file->delete();

        return redirect('/');
    }
}
