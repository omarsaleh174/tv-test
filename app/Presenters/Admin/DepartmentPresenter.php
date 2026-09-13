<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\DepartmentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DepartmentPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class DepartmentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DepartmentTransformer();
    }
}
