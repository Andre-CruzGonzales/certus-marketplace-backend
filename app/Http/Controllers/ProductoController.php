<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
class ProductoController extends Controller
{
    public function get(){
        $producto = Producto::get();
        return response()->json($producto);
    }
    public function getID($id){
        $producto = Producto::find($id);
        return response()->json($producto);
    }
}
