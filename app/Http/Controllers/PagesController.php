<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
        /**
     * Carga de la página de inicio.<
     */
    public function index()
    {
      $files = \App\Archivo::all();
      //return view('public.index', ['files' => $archivos]);
      //return view('public.index', compact('files'));
      return view('public.pages.index')->withFiles($files);
    }
    public function contact()
    {
      return view('public.pages.contact');
    }
    public function about()
    {
      return view('public.pages.about');
    }
}
