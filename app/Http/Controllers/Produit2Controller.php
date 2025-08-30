<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Str;

class Produit2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:PeutVoir', ['only' => ['index']]);
        // $this->middleware('permission:PeutAjouter', ['only' => ['create', 'store']]);
        // $this->middleware('permission:PeutModifier', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:PeutSupprimer', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produits = Produit::all();
        return view('ProduitCrud/produit', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('ProduitCrud/produitcreate');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->merge(['slug' => Str::slug($request->nom)]);
        Produit::create($request->all());
        return redirect()->back()->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $prod = Produit::findOrFail($id);

        return view('ProduitCrud/produitedit', compact('prod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->merge(['slug' => Str::slug($request->nom)]);
        $produit = Produit::findOrFail($id);
        $produit->update($request->all());
        return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->back()->with('success', 'Produit supprimé avec succès.');
    }

    // public function rapport()
    // {
    //     $produits = Produit::all();

    //     return view('rapport', compact('produits'));


    // }
}
