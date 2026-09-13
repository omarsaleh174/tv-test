<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\SubscriptionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SubscriptionPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class SubscriptionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SubscriptionTransformer();
    }
}
