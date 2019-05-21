<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'name'         => 'required|min:3',
            'description'    => 'required'
        ],[
            'name.required'=> 'El nombre es requerido.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'description.required'=> 'La descripción es requerida.',
        ]);

        Archivo::create([
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'description' => request('description')
        ]);
       
        return redirect('/');
    }

    /**
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $file)
    {
        return view('public.files.edit', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Archivo $file)
    {
        $data = request()->validate([
            'name'         => 'required|min:3',
            'description'    => 'required'
        ],[
            'name.required'=> 'El nombre es requerido.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'description.required'=> 'La descripción es requerida.',
        ]);

        $file->update([
            'name' => request('name'),
            'slug' => str_slug(request('title'), "-"),
            'description' => request('description')
        ]);
        return redirect('/files/'.$file->slug);
    }

    /**
     * Remove the specified resource from storage.
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
