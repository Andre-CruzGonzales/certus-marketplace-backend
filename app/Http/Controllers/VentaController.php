<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\VentaDetalle;
class VentaController extends Controller
{
    public function create(Request $request){
        $venta = Venta::create([
            'fecha_emision'=>date('Y-m-d'),
            'precio_total'=>$request->precio_total,
            'cliente_id'=>$request->cliente_id,
            'vendedor_id'=>$request->vendedor_id,
            'empresa_id'=>$request->empresa_id,
            'tipo_documento_venta_id'=>$request->tipo_documento_venta_id,
            'estado_venta'=>"A",
        ]);
        $productos = $request->products;
        foreach($productos as $product){
            $venta_detalle = VentaDetalle::create([

                'venta_id'=>$venta->id,
                'precio_venta'=>$product['precio'],
                'nombre'=>$product['nombre'],
                'cantidad'=>1,
                'precio_unitario'=>$product['precio'],

                'estado_registro'=>"A",
            ]);
        }
        return response()->json(["resp"=>"Correcto"]);
    }
}
