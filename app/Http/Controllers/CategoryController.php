<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $categories=Category::all();
        return response()->json($categories);
        }catch(\Exception $e){
            return response()->json("categories non disponibles");
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try{
             $categorie = new Category([
            'nomcategorie' =>$request->input('nomcategorie'),
            'imagecategorie' =>$request->input('imagecategorie'),
            
            ]);
            $categorie->save();
            return response()->json($categorie);

       }catch(\Exception $e){
        return response()->json("probleme d'ajout");

       }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $categorie=Category::findOrFail($id);
           
           
           return response()->json($categorie);

      }catch(\Exception $e){
       return response()->json("probleme de récupération");

      }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $categorie=Category::findOrFail($id);
            $categorie->update($request->all());
            return response()->json("catégorie modifiée");
        }catch(\Exception $e){
            return response()->json("modification impo{$e->getMessage()},{$e->getCode()}");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $categorie=Category::findOrFail($id);
            $categorie->delete();
            return response()->json("catégorie supprimée");
        }catch(\Exception $e){
            return response()->json("suppression impo");
        }
    }
}
