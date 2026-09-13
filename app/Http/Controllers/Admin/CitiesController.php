<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CityRequest;
use App\Repositories\Admin\CityRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class CitiesController extends Controller
{

    protected $repository;



    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'cities','cities',$this->actions);})->toJson();
        }
        return view('admin.cities.index', );
    }

    public function store(CityRequest $request)
    {
        $city = $this->repository->create($request->all());
        return redirect()->back()->with('message', 'City created.');
    }

    public function show($id)
    {
        $city = $this->repository->find($id);
        return view('admin.cities.show', compact('city'));
    }


    public function edit($id)
    {
        $city = $this->repository->find($id);
        return view('admin.cities.edit', compact('city'));
    }


    public function update(CityRequest $request, $id)
    {
        $city = $this->repository->update($request->all(), $id);
        return redirect()->back()->with('message', 'City updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'City deleted.');
    }
}
