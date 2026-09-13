<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\ConsultantRepository;
use App\Entities\Admin\Consultant;
use App\Validators\Admin\ConsultantValidator;

/**
 * Class ConsultantRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class ConsultantRepositoryEloquent extends BaseRepository implements ConsultantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Consultant::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
