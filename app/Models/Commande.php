<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commande
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $numero_commande
 * @property Carbon $date_commande
 *
 * @package App\Models
 */
class Commande extends Model
{
	protected $table = 'commandes';

	protected $casts = [
		'numero_commande' => 'int',
		'date_commande' => 'datetime'
	];

	protected $fillable = [
		'numero_commande',
		'date_commande'
	];
}
