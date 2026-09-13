<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\ClassificationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ClassificationPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class ClassificationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClassificationTransformer();
    }
}
