<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Produit
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $nom
 * @property int $prix_vente
 * @property string $slug
 * @property string $description
 *
 * @package App\Models
 */
class Produit extends Model
{
	protected $table = 'produits';

	protected $casts = [
		'prix_vente' => 'int'
	];

	protected $fillable = [
		'nom',
		'prix_vente',
		'slug',
		'description'
	];
}
