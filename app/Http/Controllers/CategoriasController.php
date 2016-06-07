<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categoria;
use App\Subcategoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'DESC')->get();
        //dd($categorias);
        $contador = 0;
        return view('categorias.index')
            ->with('categorias', $categorias)
            ->with('contador', $contador);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria($request->all());
        $categoria->save();

        flash()->success('La categoría <b>' . $categoria->nombre . '</b> se agregó con exito!');
        return redirect()->route('categorias.show', $categoria->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        $subCount = Subcategoria::where('id_categoria', '=', $id)->count();
        $subs = Subcategoria::where('id_categoria', '=', $id)->orderBy('id', 'DESC')->get();
        $contador = 0;
        return view('categorias.show')
            ->with('categoria', $categoria)
            ->with('subCount', $subCount)
            ->with('subs', $subs)
            ->with('contador', $contador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.edit')
            ->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();

        flash()->warning('La categoría <b>' . $categoria->nombre . '</b> se actualizó con exito!');
        return redirect()->route('categorias.show', $categoria->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        flash()->error('La categoría <b>' . $categoria->nombre . '</b> se eliminó con exito!');
        return redirect()->route('categorias.index');
    }
}
