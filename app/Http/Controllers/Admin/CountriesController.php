<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CountryRequest;
use App\Repositories\Admin\CountryRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class CountriesController extends Controller
{

    protected $repository;



    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'countries','countries',$this->actions);})->toJson();
        }
        return view('admin.countries.index', );
    }

    public function store(CountryRequest $request)
    {
        $country = $this->repository->create($request->all());
        return redirect()->back()->with('message', 'Country created.');
    }

    public function show($id)
    {
        $country = $this->repository->find($id);
        return view('admin.countries.show', compact('country'));
    }


    public function edit($id)
    {
        $country = $this->repository->find($id);
        return view('admin.countries.edit', compact('country'));
    }


    public function update(CountryRequest $request, $id)
    {
        $country = $this->repository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Country updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Country deleted.');
    }
}
