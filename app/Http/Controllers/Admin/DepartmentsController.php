<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DepartmentRequest;
use App\Repositories\Admin\DepartmentRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class DepartmentsController extends Controller
{

    protected $repository;



    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'departments','departments',$this->actions);})->toJson();
        }
        return view('admin.departments.index', );
    }

    public function store(DepartmentRequest $request)
    {
        $department = $this->repository->create($request->all());
        if($request->hasFile('photo')) {
            $department->photo=$this->fileUpload('departments',$request->photo);
            $department->save();
        }

        return redirect()->back()->with('message', 'Department created.');
    }

    public function show($id)
    {
        $department = $this->repository->find($id);
        return view('admin.departments.show', compact('department'));
    }


    public function edit($id)
    {
        $department = $this->repository->find($id);
        return view('admin.departments.edit', compact('department'));
    }


    public function update(DepartmentRequest $request, $id)
    {
        $department = $this->repository->update($request->all(), $id);
        if($request->hasFile('photo')) {
            $department->photo=$this->fileUpload('departments',$request->photo);
            $department->save();
        }  

        return redirect()->back()->with('message', 'Department updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Department deleted.');
    }
}
