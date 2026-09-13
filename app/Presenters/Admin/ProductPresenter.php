<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\ProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

 
class ProductPresenter extends FractalPresenter
{
    
    public function getTransformer()
    {
        return new ProductTransformer();
    }
}
