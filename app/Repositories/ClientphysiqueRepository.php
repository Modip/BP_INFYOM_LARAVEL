<?php

namespace App\Repositories;

use App\Models\Clientphysique;
use App\Repositories\BaseRepository;

/**
 * Class ClientphysiqueRepository
 * @package App\Repositories
 * @version October 16, 2020, 11:00 am UTC
*/

class ClientphysiqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Clientphysique::class;
    }
}
