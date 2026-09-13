<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Admin\CategoryRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
{

    protected $repository;



    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'categories','categories',$this->actions);})->toJson();
        }
        return view('admin.categories.index', );
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->repository->create($request->all());
        if($request->hasFile('photo')) {
            $category->photo=$this->fileUpload('categories',$request->photo);
            $category->save();
        }
        return redirect()->back()->with('message', 'Category created.');
    }

    public function show($id)
    {
        $category = $this->repository->find($id);
        return view('admin.categories.show', compact('category'));
    }


    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = $this->repository->update($request->all(), $id);
        if($request->hasFile('photo')) {
            $category->photo=$this->fileUpload('categories',$request->photo);
            $category->save();
        }  

        return redirect()->back()->with('message', 'Category updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Category deleted.');
    }
}
