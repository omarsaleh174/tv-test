<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\PartRepository;
use App\Entities\Admin\Part;
use App\Validators\Admin\PartValidator;

/**
 * Class PartRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class PartRepositoryEloquent extends BaseRepository implements PartRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Part::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
