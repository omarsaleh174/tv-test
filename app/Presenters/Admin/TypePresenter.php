<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\TypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TypePresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class TypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TypeTransformer();
    }
}
