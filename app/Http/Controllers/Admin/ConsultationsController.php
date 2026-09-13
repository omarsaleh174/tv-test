<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ConsultationRequest;
use App\Repositories\Admin\ConsultationRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class ConsultationsController extends Controller
{

    protected $repository;



    public function __construct(ConsultationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();

            
            if($request->consultant_id!=null)
            $item->where('consultant_id',$request->consultant_id);
            if($request->search!=null)
            $item->where('title','like',"%".$request->search."%")->orWhere('message','like',"%".$request->search."%");


            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'consultations','consultations',$this->actions);})->toJson();
        }
        return view('admin.consultations.index', );
    }

    public function store(ConsultationRequest $request)
    {
        $consultation = $this->repository->create($request->all());
        return redirect()->back()->with('message', 'Consultation created.');
    }

    public function show($id)
    {
        $consultation = $this->repository->find($id);
        return view('admin.consultations.show', compact('consultation'));
    }


    public function edit($id)
    {
        $consultation = $this->repository->find($id);
        return view('admin.consultations.edit', compact('consultation'));
    }


    public function update(ConsultationRequest $request, $id)
    {
        $consultation = $this->repository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Consultation updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Consultation deleted.');
    }
}
