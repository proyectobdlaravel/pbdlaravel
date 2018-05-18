<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Anuncio;

class AnunciosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCrearAnuncios()
    {
        return view('crear_anuncio');
    }

    public function indexModificarAnuncios($id_anuncio)
    {
        return view('modificar_anuncio')->with('id_anuncio',$id_anuncio);
    }

    public function indexMisAnuncios()
    {
        return view('mis_anuncios');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anuncio = new Anuncio;

        $anuncio->titulo = $request->input('titulo');
        $anuncio->cuerpo = $request->input('cuerpo');
        $anuncio->precio = $request->input('precio');
        $anuncio->url_imagen = $request->input('url_imagen');
        if (Auth::check())
        {
            $anuncio->creator_id = Auth::user()->getId();
        }
        $anuncio->save();

        return redirect()->back()->with('alert', 'Tu anuncio ha sido publicado con éxito. ¡Échale un vistazo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_anuncio)
    {
        $anuncio = Anuncio::find($id_anuncio);

        $anuncio->update($request->all());

        return redirect()->back()->with('alert', 'Tu anuncio ha sido modificado con éxito. ¡Échale un vistazo de nuevo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_anuncio)
    {
        $anuncio = Anuncio::find($id_anuncio);

        $anuncio->delete();

        return redirect()->back()->with('alert', 'Tu anuncio ha sido borrado con éxito. ¡Esperamos que te hayas despedido de él porque ya es tarde!');
    }

    public function view()
    {        
        $anuncios = Anuncio::all();
        return view('tablon', ['anuncios' => $anuncios]);
    }
}
