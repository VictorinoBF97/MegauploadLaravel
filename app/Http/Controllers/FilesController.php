<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Archivo::paginate(10);

        return view('public.files.index')->withFiles($files);
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
    public function store(FileRequest $request)
    {

        Archivo::create([
            'user_id' => $request->user()->id,
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
    public function update(FileRequest $request,Archivo $file)
    {

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
