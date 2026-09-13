<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Traits\MediaTrait;

class Controller extends BaseController
{
    use MediaTrait;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $actions=['show','edit','delete'];
    public function __invoke($id) {
        $item = $this->repository->findorFail($id);
        $active=$item->active==1?0:1;
        $item->active=$active;
        $item->save();
        $message=$item->active==1?'unsuspended':'Suspended';
        return redirect()->back()->with('message', 'item'.$message);
    }
}

