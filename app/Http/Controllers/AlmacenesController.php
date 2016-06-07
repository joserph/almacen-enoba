<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Almacen;

class AlmacenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes = Almacen::with('user')->orderBy('id', 'DESC')->get();
        //dd($almacenes);
        $contador = 0;
        return view('almacenes.index')
            ->with('almacenes', $almacenes)
            ->with('contador', $contador);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacen = new Almacen($request->all());
        $almacen->save();

        flash()->success('El almacén <b>' . $almacen->nombre . '</b> se agregó con exito!');
        return redirect()->route('almacenes.index');
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
    public function edit($id)
    {
        $almacen = Almacen::find($id);
        return view('almacenes.edit')
            ->with('almacen', $almacen);
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
        $almacen = Almacen::find($id);
        $almacen->fill($request->all());
        $almacen->save();

        flash()->warning('El almacén <b>' . $almacen->nombre . '</b> se actualizó con exito!');
        return redirect()->route('almacenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $almacen = Almacen::find($id);
        $almacen->delete();

        flash()->error('El almacén <b>' . $almacen->nombre . '</b> se eliminó con exito!');
        return redirect()->route('almacenes.index');
    }
}
