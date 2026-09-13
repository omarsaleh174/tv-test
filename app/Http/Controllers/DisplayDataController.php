<?php

namespace App\Http\Controllers;

use App\Entities\Admin\CLient;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class DisplayDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $collection = Client::query();

        return DataTables::of($collection)->make(true);
    }

    public function create(): View
    {
        return view('display');
    }
}
