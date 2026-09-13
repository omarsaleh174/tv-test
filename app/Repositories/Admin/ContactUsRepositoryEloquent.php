<?php

namespace App\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\contactUsRepository;
use App\Entities\Admin\ContactUs;
use App\Validators\Admin\ContactUsValidator;

/**
 * Class ContactUsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin;
 */
class ContactUsRepositoryEloquent extends BaseRepository implements ContactUsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContactUs::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
