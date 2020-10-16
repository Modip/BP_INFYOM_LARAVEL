<?php

namespace App\Repositories;

use App\Models\CompteCltphysique;
use App\Repositories\BaseRepository;

/**
 * Class CompteCltphysiqueRepository
 * @package App\Repositories
 * @version October 16, 2020, 11:49 am UTC
*/

class CompteCltphysiqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'clientphysique_id',
        'numerocompte',
        'solde',
        'clerib',
        'frais'
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
        return CompteCltphysique::class;
    }
}
