<?php

namespace App\Repositories;

use App\Models\wc_tournament;
use App\Repositories\BaseRepository;

/**
 * Class wc_tournamentRepository
 * @package App\Repositories
 * @version August 1, 2020, 1:40 pm UTC
*/

class wc_tournamentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'start_date',
        'year',
        'country'
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
        return wc_tournament::class;
    }
}
