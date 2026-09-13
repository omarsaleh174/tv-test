<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\ConsultantTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConsultantPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class ConsultantPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConsultantTransformer();
    }
}
