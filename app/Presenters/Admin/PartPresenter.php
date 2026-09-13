<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\PartTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PartPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class PartPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PartTransformer();
    }
}
