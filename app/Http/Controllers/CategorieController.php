<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        return Category::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $categorie = new Category();
        $categorie::create([
            'nom' => $request->nom,
        ]);

        return Category::all();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        return Category::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $categorie = Category::find($id);
        $categorie->nom = $request->nom;
        $categorie->save();

        return $categorie;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
