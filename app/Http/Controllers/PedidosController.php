<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Productos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Productos::all();
        $pedidos = Pedidos::paginate(5);

        return view('pedido.index', compact('productos', 'pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pedido.create');
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
        $datosPedido = request()->except('_token');

        if(Productos::where('id', $datosPedido['Id_Producto'])->exists()){
            Pedidos::insert($datosPedido);

            if($datosPedido['Estatus'] == "entregado"){
                $producto = Productos::findOrFail($datosPedido['Id_Producto']);
                $producto->cantidad -= $datosPedido['Cantidad'];
                $producto->update();
            }

            return response()->json($datosPedido);
        } else {
            return response()->json(['error' => 'El Id del producto no existe']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pedido=Pedidos::findOrFail($id);

        return view('pedido.edit', compact('pedido') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosPedido = request()->except(['_token','_method']);

        if($datosPedido['Estatus'] == "entregado"){
            $producto = Productos::findOrFail($datosPedido['Id_Producto']);
            $producto->cantidad -= $datosPedido['Cantidad'];
            $producto->update();
        }

        $pedido=Pedidos::findOrFail($id);
        Pedidos::where('id','=',$id)->update($datosPedido);
        return view('pedido.edit', compact('pedido') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pedido=Pedidos::findOrFail($id);
        Pedidos::destroy($id);
        return redirect('pedido');
    }
}
