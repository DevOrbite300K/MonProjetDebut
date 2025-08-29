@extends('base')

@section('title', 'Créer un Produit')

@section('content')
    <div class="container mt-5">
        <div class="row align-items-center alert alert-success">
            <div class="col-md-12">
                <h3 class="fw-bold mb-0">ajouter un Produit</h3>
            </div>
        </div>
        <form action="{{ route('produits.store') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                
                <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
                <label for="nom" class="form-label">Nom du Produit</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="prix_vente" name="prix_vente" placeholder="prix de vente" step="0.01" required>
                <label for="prix_vente" class="form-label">Prix de Vente</label>
            </div>
            <div class="form-floating mb-3">
                
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="description" required></textarea>
                <label for="description" class="form-label">Description</label>
            </div>

            <button type="submit" class="btn btn-primary col-3">ajouter
                <i class="fas fa-plus"></i>
            </button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary col-3">Retour à la liste
                <i class="fas fa-arrow-left"></i>
            </a>

        </form>
    </div>
@endsection