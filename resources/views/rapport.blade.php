@extends('base')

@section('title', 'Rapport')

@section('css')
    <style>
                .card:hover {
                    background-color: #c7ced6; /* couleur plus foncée au survol */
                    transform: scale(1.05);    /* légèrement agrandi */
                    transition: all 0.3s ease;
                    cursor: pointer;
                    z-index: 1;
                }
    </style>
@endsection

@section('content')
<div class="container mt-5">
    <h4 class="mb-4 alert alert-info">Rapport descriptif
        <i class="fas fa-chart-line"></i>
    </h4>
    <hr>

    

    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm hover-card c">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Statistiques</h4>
                </div>
                <div class="card-body">
                    <h5 class="text-muted">Nombre total de produits :
                        <i class="fas fa-box"></i>
                    </h5>
                    <p>{{ $produits->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Statistiques</h4>
                </div>
                <div class="card-body">
                    <h5>Nombre total de produits :</h5>
                    <p>{{ $produits->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Statistiques</h4>
                </div>
                <div class="card-body">
                    <h5>Nombre total de produits :</h5>
                    <p>{{ $produits->count() }}</p>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Liste des Produits récents
                        <i class="fas fa-list"></i>
                    </h4>
                </div>
                <div class="card-body">
                    @if($produits->isEmpty())
                        <p>Aucun produit disponible.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prix de Vente</th>
                                    <th>Description</th>
                                    <th>
                                        Date d'ajout
                                    </th>
                                    <th>
                                        Date de mise à jour
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produits as $produit)
                                    <tr>
                                        <td>{{ $produit->nom }}</td>
                                        <td>{{ $produit->prix_vente }} GNF</td>
                                        <td>{{ $produit->description }}</td>
                                        <td>{{ $produit->created_at }}</td>
                                        <td>{{ $produit->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>

            </div>

        </div>
        
    </div>
    <hr>

    <h3 class="mt-4 alert alert-info">
        Vue en graphique
    </h3>


    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Graphique des Produits</h4>
                </div>
                <div class="card-body">
                    <canvas id="produitChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Graphique des Ventes</h4>
                </div>
                <div class="card-body">
                    <canvas id="produitChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    

    <h3 class="mt-4 alert alert-info">
        Plus de detail
    </h3>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Action rapide</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        cliquer rapidement sur: <br>
                        <a href="{{ route('produits.create') }}" class="btn btn-primary btn-sm">Ajouter un produit
                            <i class="fas fa-plus"></i>
                        </a>
                        <hr>
                        <a href="{{ route('produits.index') }}" class="btn btn-secondary btn-sm">Voir tous les produits
                            <i class="fas fa-list"></i>
                        </a>
                        <hr>
                    </p>
                </div>


            </div>
            

        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Commandes recentes</h4>
                </div>
                <div class="card-body">
                    <p>Aucune commande récente.</p>
                </div>
            </div>

        </div>
    </div>


</div>
@endsection
