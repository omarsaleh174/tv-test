<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\PhotoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PhotoPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class PhotoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PhotoTransformer();
    }
}
