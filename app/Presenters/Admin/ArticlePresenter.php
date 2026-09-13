<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\ArticleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ArticlePresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class ArticlePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ArticleTransformer();
    }
}
