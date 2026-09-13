<?php

namespace App\Presenters\Admin;

use App\Transformers\Admin\ContactUsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContactUsPresenter.
 *
 * @package namespace App\Presenters\Admin;
 */
class ContactUsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContactUsTransformer();
    }
}
