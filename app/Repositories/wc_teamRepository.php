<?php

namespace App\Repositories;

use App\Models\wc_team;
use App\Repositories\BaseRepository;

/**
 * Class wc_teamRepository
 * @package App\Repositories
 * @version August 1, 2020, 1:41 pm UTC
*/

class wc_teamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'country',
        'country_now',
        'area',
        'lat',
        'lng'
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
        return wc_team::class;
    }
}
