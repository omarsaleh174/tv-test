<?php

namespace App\Repositories\Admin;

use App\Entities\Admin\Order;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    public function model()
    {
        return Order::class;
    }
}