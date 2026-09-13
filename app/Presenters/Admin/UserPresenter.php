<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\UserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

 
class UserPresenter extends FractalPresenter
{
   
    public function getTransformer()
    {
        return new UserTransformer();
    }
}
