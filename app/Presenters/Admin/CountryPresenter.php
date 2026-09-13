<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\CountryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

 
class CountryPresenter extends FractalPresenter
{
    
    public function getTransformer()
    {
        return new CountryTransformer();
    }
}
