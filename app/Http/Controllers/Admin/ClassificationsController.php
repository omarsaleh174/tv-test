<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ClassificationRequest;
use App\Repositories\Admin\ClassificationRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class ClassificationsController extends Controller
{

    protected $repository;



    public function __construct(ClassificationRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'classifications','classifications',$this->actions);})->toJson();
        }
        return view('admin.classifications.index', );
    }

    public function store(ClassificationRequest $request)
    {
        $classification = $this->repository->create($request->all());
        if($request->hasFile('photo')) {
            $classification->photo=$this->fileUpload('classifications',$request->photo);
            $classification->save();
        }

        return redirect()->back()->with('message', 'Classification created.');
    }

    public function show($id)
    {
        $classification = $this->repository->find($id);
        return view('admin.classifications.show', compact('classification'));
    }


    public function edit($id)
    {
        $classification = $this->repository->find($id);
        return view('admin.classifications.edit', compact('classification'));
    }


    public function update(ClassificationRequest $request, $id)
    {
        $classification = $this->repository->update($request->all(), $id);
        if($request->hasFile('photo')) {
            $classification->photo=$this->fileUpload('classifications',$request->photo);
            $classification->save();
        }  

        return redirect()->back()->with('message', 'Classification updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Classification deleted.');
    }
}
