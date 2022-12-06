<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
class ProductoController extends Controller
{
    public function get(){
        $producto = Producto::with('categoria')->where('estado_registro','A')->get();
        return response()->json($producto);
    }
    public function getID($id){
        $producto = Producto::find($id);
        return response()->json($producto);
    }
    public function create(Request $request){
        $producto = Producto::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'estado_registro'=>'A',
            'publicado'=>0,
            'categoria_id'=>$request->categoria_id
        ]);
        if ($request->hasFile('imagen')) {

            $path = $request->file('imagen')->storeAs('public/productos/', $producto->id . '.' . $request->imagen->extension());
            $image = $producto->id . '.' . $request->imagen->extension();
            $producto->imagen = $image;
            $producto->save();
        }
        return response()->json(["resp"=>"producto creado"]);
    }
    public function update(Request $request,$idProducto){
        $producto=Producto::find($idProducto);
        $producto->fill([
             'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'imagen'=>$request->imagen,
              'categoria_id'=>$request->categoria_id
        ])->save();
        if ($request->hasFile('imagen')) {

            $path = $request->file('imagen')->storeAs('public/productos/', $producto->id . '.' . $request->imagen->extension());
            $image = $producto->id . '.' . $request->imagen->extension();
            $producto->imagen = $image;
            $producto->save();
        }
        return reponse()->json(["resp"=>"producto actualizado"]);
    }
    public function delete($idProducto){
        $producto=Producto::find($idProducto);
        $producto->fill([
            'estado_registro'=>"I"
        ])->save();
        return reponse()->json(["resp"=>"producto eliminado"]);
    }
    public function publicar(Request $request,$idProducto){
        $producto=Producto::find($idProducto);
        $producto->fill([
            'publicado'=>$request->publicado
        ])->save();
        return response()->json(["resp"=>"producto actualizado"]);
    }
    public function getPublicados(){
        $producto = Producto::with('categoria')->where('estado_registro','A')->where('publicado',1)->get();
        return response()->json($producto);
    }
}
