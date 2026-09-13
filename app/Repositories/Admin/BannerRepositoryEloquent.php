<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\BannerRepository;
use App\Entities\Admin\Banner;
use App\Validators\Admin\BannerValidator;

/**
 * Class BannerRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class BannerRepositoryEloquent extends BaseRepository implements BannerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BannerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
