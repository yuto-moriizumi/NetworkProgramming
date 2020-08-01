<?php

namespace App\Repositories;

use App\Models\wc_round;
use App\Repositories\BaseRepository;

/**
 * Class wc_roundRepository
 * @package App\Repositories
 * @version August 1, 2020, 1:40 pm UTC
*/

class wc_roundRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tournament_id',
        'name',
        'ordering',
        'knockout',
        'start_date',
        'end_date'
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
        return wc_round::class;
    }
}
