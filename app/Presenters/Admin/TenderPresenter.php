<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\TenderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TenderPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class TenderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TenderTransformer();
    }
}
