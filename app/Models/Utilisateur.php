<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
// use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Models\Role;


/**
 * Class Utilisateur
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $nom
 * @property string $email
 * @property string $password
 *
 * @package App\Models
 */
class Utilisateur extends Authenticatable
{
	 use HasFactory, Notifiable, HasRoles;

	protected $table = 'utilisateurs';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nom',
		'email',
		'password'
	];
}
