@extends('base')

@section('title', 'Modifier le Produit')


@section('content')
    <div class="container mt-5">
        <div class="row align-items-center alert alert-warning">
            <div class="col-md-12">
                <h3 class="fw-bold mb-0">Modifier le Produit : {{ $prod->nom }}</h3>
            </div>
        </div>
        <form action="{{ route('produits.update', $prod->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du produit</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $prod->nom }}" required>
            </div>

            <div class="mb-3">
                <label for="prix_vente" class="form-label">Prix de vente</label>
                <input type="number" class="form-control" id="prix_vente" name="prix_vente" value="{{ $prod->prix_vente }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $prod->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
