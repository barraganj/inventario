<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos['productos']=Producto::paginate(5);
        return view('producto.index',$productos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[

            'nombreProducto'=>'required|string|max:100',
            'referencia'=>'required|string|max:50',
            'precio'=>'required',
            'peso'=>'required',
            'categoria'=>'required|string|max:50',
            'stock'=>'required|numeric',
            'fechaCreacion'=>'required|date',
            'fechaUltimaVenta'=>'required|date',

        ];

        $mensaje=[

            'required'=>'El :attribute es requerido',

        ];
        
        $this->validate($request,$campos,$mensaje);
        $producto = request()->except('_token');
        Producto::insert($producto);
        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto=Producto::findOrFail($id);
        return view('producto.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos=[

            'nombreProducto'=>'required|string|max:100',
            'referencia'=>'required|string|max:50',
            'precio'=>'required',
            'peso'=>'required',
            'categoria'=>'required|string|max:50',
            'stock'=>'required|numeric',
            'fechaCreacion'=>'required|date',
            'fechaUltimaVenta'=>'required',

        ];

        $mensaje=[

            'required'=>'El :attribute es requerido',

        ];

        $this->validate($request,$campos,$mensaje);

        $producto = request()->except('_token','_method');
        Producto::where('id','=',$id)->update($producto);

        $producto=Producto::findOrFail($id);
        return redirect('producto')->with('mensaje','Producto actualizado');;

        // return view('producto.edit',compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto::destroy($id);
        return redirect('producto')->with('mensaje','Producto eliminado');;
    }

    public function getFechaUltimaVenta($fechaUltimaVenta)
    {
    return Producto::parse($fechaUltimaVenta)->format('Y-m-d H:i:s');
    }

    public function venderProducto(Request $request,  $id){

        Producto::where('id','=',$id)->decremnt('stock');
        $producto=Producto::findOrFail($id);

        return redirect('producto')->with('mensaje','Producto vendido');

    }
}
