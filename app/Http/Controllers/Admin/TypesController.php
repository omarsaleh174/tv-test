<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TypeRequest;
use App\Repositories\Admin\TypeRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class TypesController extends Controller
{

    protected $repository;



    public function __construct(TypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'types','types',$this->actions);})->toJson();
        }
        return view('admin.types.index', );
    }

    public function store(TypeRequest $request)
    {
        $type = $this->repository->create($request->all());
        return redirect()->back()->with('message', 'Type created.');
    }

    public function show($id)
    {
        $type = $this->repository->find($id);
        return view('admin.types.show', compact('type'));
    }


    public function edit($id)
    {
        $type = $this->repository->find($id);
        return view('admin.types.edit', compact('type'));
    }


    public function update(TypeRequest $request, $id)
    {
        $type = $this->repository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Type updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Type deleted.');
    }
}
