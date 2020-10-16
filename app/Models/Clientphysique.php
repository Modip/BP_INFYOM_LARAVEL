<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clientphysique
 * @package App\Models
 * @version October 16, 2020, 11:00 am UTC
 *
 * @property string $prenom
 * @property string $nom
 * @property string $adresse
 * @property integer $cni
 * @property integer $telephone
 * @property string $email
 * @property string $login
 * @property string $password
 */
class Clientphysique extends Model
{
    use SoftDeletes;

    public $table = 'clientphysiques';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'prenom',
        'nom',
        'adresse',
        'cni',
        'telephone',
        'email',
        'login',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prenom' => 'string',
        'nom' => 'string',
        'adresse' => 'string',
        'cni' => 'integer',
        'telephone' => 'integer',
        'email' => 'string',
        'login' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prenom' => 'min:3',
        'nom' => 'min:2',
        'adresse' => 'min:4',
        'cni' => 'min:12',
        'telephone' => 'min:9',
        'email' => 'min:10',
        'login' => 'min:3',
        'password' => 'min:8'
    ];

    
}
