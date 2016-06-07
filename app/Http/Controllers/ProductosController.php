<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Subcategoria;
use App\Almacen;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('user', 'sub', 'almacenes')->orderBy('id', 'DESC')->get();
        //dd($productos);
        $contador = 0;
        return view('productos.index')
            ->with('productos', $productos)
            ->with('contador', $contador);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcat = Subcategoria::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $almacenes = Almacen::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        //dd($subcat);
        return view('productos.create')
            ->with('subcat', $subcat)
            ->with('almacenes', $almacenes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto($request->all());
        $producto->save();
        $producto->almacenes()->sync($request->almacenes);

        flash()->success('El producto <b>' . $producto->nombre . '</b> se agregó con exito!');
        return redirect()->route('productos.index');
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
        $producto = Producto::find($id);
        $subcat = Subcategoria::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $almacenes = Almacen::orderBy('nombre', 'ASC')->lists('nombre', 'id');

        $misAlmacenes = $producto->almacenes->lists('id')->ToArray();
        return view('productos.edit')
            ->with('producto', $producto)
            ->with('subcat', $subcat)
            ->with('almacenes', $almacenes)
            ->with('misAlmacenes', $misAlmacenes);
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
        $producto = Producto::find($id);
        $producto->fill($request->all());
        $producto->save();
        $producto->almacenes()->sync($request->almacenes);

        flash()->warning('El producto <b>' . $producto->nombre . '</b> se actualizó con exito!');
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);       
        $producto->delete();

        flash()->error('El producto <b>' . $producto->nombre . '</b> se eliminó con exito!');
        return redirect()->route('productos.index');
    }
}
