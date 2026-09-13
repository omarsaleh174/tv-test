<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\ConsultationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConsultationPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class ConsultationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConsultationTransformer();
    }
}
