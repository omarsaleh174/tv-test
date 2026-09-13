<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Consultation.
 *
 * @package namespace App\Entities\Admin;
 */
class Consultation extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = ['client_id', 'consultant_id','department_id', 'message', 'title','country_id'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

}
