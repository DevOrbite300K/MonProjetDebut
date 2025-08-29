
@extends('base')

@section('title', 'Gestion des Produits')

@section('content')
    <div class="container mt-5">
        <!-- En-tête -->
        <div class="row align-items-center alert alert-primary">
            <div class="col-md-6">
                <h3 class="fw-bold mb-0">Gestion des Produits</h3>
            </div>
            <div class="col-md-6 text-end">
                <!-- ✅ Bouton pour ouvrir la modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-circle"></i> Ajouter un Produit
                </button>
            </div>
        </div>

        <div class="row">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </div>

        <!-- ✅ Modal Ajout Produit -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <!-- En-tête -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- ✅ Formulaire -->
                    <form action="{{ route('produits.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom du produit</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>

                            <div class="mb-3">
                                <label for="prix_vente" class="form-label">Prix de vente</label>
                                <input type="number" class="form-control" id="prix_vente" name="prix_vente" step="0.01" required>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" required>
                            </div> --}}

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- ✅ Fin Modal -->

        <!-- ✅ Liste des Produits -->
        <div class="card mt-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Liste des Produits</h5>
                <input type="text" class="form-control w-50" placeholder="🔍 Rechercher un produit">
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prix de vente</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Date de création</th>
                            <th>
                                Date de Modification
                            </th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        <!-- Exemple : tu remplaceras par ta boucle Blade -->
                        @foreach ($produits as $produit)
                        <tr>
                            <td>{{ $produit->id }}</td>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->prix_vente }} GNF</td>
                            <td>{{ $produit->slug }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>{{ $produit->created_at }}</td>
                            <td>{{ $produit->updated_at }}</td>
                            <td class="text-center">
                                @can("PeutModifier")
                                <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-warning btn-sm" 
                                    
                                    ><i class="bi bi-pencil"></i></a>
                                    
                                @endcan

                                @can('PeutSupprimer')

                                <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('⚠️ Voulez-vous vraiment supprimer ce produit ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                    
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        <!-- Fin boucle -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
