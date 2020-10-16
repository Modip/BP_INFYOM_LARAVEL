<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompteCltphysique
 * @package App\Models
 * @version October 16, 2020, 11:49 am UTC
 *
 * @property integer $clientphysique_id
 * @property integer $numerocompte
 * @property integer $solde
 * @property integer $clerib
 * @property integer $frais
 */
class CompteCltphysique extends Model
{
    use SoftDeletes;

    public $table = 'compte_cltphysiques';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'clientphysique_id',
        'numerocompte',
        'solde',
        'clerib',
        'frais'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'clientphysique_id' => 'integer',
        'numerocompte' => 'integer',
        'solde' => 'integer',
        'clerib' => 'integer',
        'frais' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'clientphysique_id' => '20',
        'numerocompte' => '20',
        'solde' => 'min:30',
        'clerib' => '4',
        'frais' => '10'
    ];

    
}
