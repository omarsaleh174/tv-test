<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PartRequest;
use App\Repositories\Admin\PartRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class PartsController extends Controller
{

    protected $repository;



    public function __construct(PartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $items=$this->repository->all();
        return view('admin.parts.index', compact('items'));
    }

    public function show($id)
    {
        $part = $this->repository->find($id);
        return view('admin.parts.show', compact('part'));
    }


    public function edit($id)
    {
        $part = $this->repository->find($id);
        return view('admin.parts.edit', compact('part'));
    }


    public function update(PartRequest $request, $id)
    {
        $part = $this->repository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Part updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Part deleted.');
    }
}
