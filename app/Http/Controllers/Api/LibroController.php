<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(){
        $libros = Libro::all();
        return response()->json($libros,200);
    }

    public function store(Request $request){
        $libros = Libro::create($request->all());
        return response()->json($libros,201);
    }

    public function show($id){
        $libros = Libro::findOrFail($id);
        if(!$libros){
            return response()->json(['message'=>'libro no encontrado'],404);
        }
        return response()->json($libros,200);
    }

    public function update(Request $request,$id){
        $libros = Libro::findOrFail($id);
        if(!$libros){
            return response()->json(['message'=>'libro no encontrado'],404);
        }
        $libros->update($request->all());
        return response()->json($libros,200);

    }

    public function destroy($id){
        $libros = Libro::findOrFail($id);
        if(!$libros){
            return response()->json(['message'=>'libro no encontrado'],404);
        }
        $libros->delete();
        return response()->json(['message'=>'libro eliminado'],200);
        
        

    }
}
