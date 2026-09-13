<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\ClassificationRepository;
use App\Entities\Admin\Classification;
use App\Validators\Admin\ClassificationValidator;

/**
 * Class ClassificationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class ClassificationRepositoryEloquent extends BaseRepository implements ClassificationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Classification::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
