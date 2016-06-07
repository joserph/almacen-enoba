<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subcategoria;
use Validator;

class SubcategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = Subcategoria::with('user', 'categoria')->orderBy('id', 'DESC')->get();
        //dd($subs);
        $contador = 0;
        return view('subcategorias.index')
            ->with('subs', $subs)
            ->with('contador', $contador);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Request::ajax())
        {
            //Validamos 
            $validator = Validator::make($request->all(), [
                'nombre'    => 'required|unique:subcategorias',
                'estado'    => 'required'
            ]);
            //Validamos si falla
            if($validator->fails())
            {
                return response()->json([
                    'success'   => false,
                    'errors'    => $validator->getMessageBag()->toArray()
                ]);
            }else{
                //Si todo va bién
                $sub = new Subcategoria($request->all());
                $sub->save();
                //Si lo guarda
                if($sub)
                {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'La subcategoría <b>' . $sub->fecha . '</b> se agregó con exito!',
                        'sub'       => $sub->toArray()
                    ]);
                }
            }   
        }
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
        $sub = Subcategoria::with('categoria')->find($id);
        return view('subcategorias.edit')
            ->with('sub', $sub);
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
        $sub = Subcategoria::find($id);
        $sub->fill($request->all());
        $sub->save();

        flash()->warning('La subcategoría <b>' . $sub->nombre . '</b> se actualizó con exito!');
        return redirect()->route('categorias.show', $sub->id_categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = Subcategoria::find($id);
        $sub->delete();

        flash()->error('La subcategoría <b>' . $sub->nombre . '</b> se eliminó con exito!');
        return redirect()->route('categorias.show', $sub->id_categoria);
    }
}
