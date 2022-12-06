<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    public function create(Request $request){
        $categoria = Categoria::create([
            "nombre"=>$request->nombre,
        ]);
         if ($request->hasFile('imagen')) {

            $path = $request->file('imagen')->storeAs('public/categorias/', $categoria->id . '.' . $request->imagen->extension());
            $image = $categoria->id . '.' . $request->imagen->extension();
            $categoria->url_imagen = $image;
            $categoria->save();
        }
        return response()->json(["resp"=>"Categoria creado"]);
    }
    public function get(){
        $categoria = Categoria::where('estado_registro','A')->get();
        return response()->json($categoria);
    }
    public function update(Request $request,$idCategoria){
        $categoria = Categoria::find($idCategoria);
        $categoria->fill([
            "nombre"=>$request->nombre,
        ])->save();;

         if ($request->hasFile('imagen')) {

            $path = $request->file('imagen')->storeAs('public/categorias/', $categoria->id . '.' . $request->imagen->extension());
            $image = $categoria->id . '.' . $request->imagen->extension();
            $categoria->url_imagen = $image;
            $categoria->save();
        }
        return response()->json(["resp"=>"Categoria actualizado"]);
    }
    public function delete($idCategoria){
        $categoria=Categoria::find($idCategoria);
        $categoria->estado_registro='I';
        $categoria->save();
        return response()->json(["resp"=>"categoria eliminado"]);
    }
    public function getId($idCategoria){
         $categoria = Categoria::with('productos')->find($idCategoria);
        return response()->json($categoria);
    }
}
