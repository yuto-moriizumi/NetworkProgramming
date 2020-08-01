<?php

namespace App\Repositories;

use App\Models\test;
use App\Repositories\BaseRepository;

/**
 * Class testRepository
 * @package App\Repositories
 * @version August 1, 2020, 1:14 pm UTC
*/

class testRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return test::class;
    }
}
