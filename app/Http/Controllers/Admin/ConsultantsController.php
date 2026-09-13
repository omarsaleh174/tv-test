<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ConsultantRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\ConsultantRepository;
use App\Services\MediaService;

class ConsultantsController extends Controller
{

    protected $repository;

    public function __construct(ConsultantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();

        if($request->country_id!=null)
            $item->where('country_id',$request->country_id);   
        if($request->department_id!=null)
            $item->where('department_id',$request->department_id);   
            if($request->city_id!=null)
            $item->where('city_id',$request->city_id);   



            
        return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'consultants','consultants',$this->actions);})->toJson();
        }
        return view('admin.consultants.index', );
    }

    public function store(ConsultantRequest $request)
    {
        $consultant = $this->repository->create($request->all());
        if($request->hasFile('photo')) {
            $service=new MediaService();
            $consultant->photo=$service->fileUpload('consultants',$request->photo);
            $consultant->save();
        }   return redirect()->back()->with('message', 'Consultant created.');
    }
    
    public function create()
    {
        return view('admin.consultants.create', );
    }
    
    public function show($id)
    {
        $consultant = $this->repository->find($id);
        return view('admin.consultants.show', compact('consultant'));
    }
    public function vip()
    {
        $consultants = $this->repository->select('id','name','email','is_visible_on_home')->orderBy('is_visible_on_home','desc')->get();
        return view('admin.consultants.vip', compact('consultants'));
    }

    public function vip_update(Request $request)
    {
        $vipConsultants = $request->input('consultants', []);
        $this->repository->whereIn('id', array_keys($vipConsultants))->update(['is_visible_on_home' => true]);
        $this->repository->whereNotIn('id', array_keys($vipConsultants))->update(['is_visible_on_home' => false]);
        return redirect()->back()->with('message', 'Consultant updated.');
    }


    public function edit($id)
    {
        $consultant = $this->repository->find($id);
        return view('admin.consultants.edit', compact('consultant'));
    }


    public function update(ConsultantRequest $request, $id)
    {
        $consultant = $this->repository->update($request->all(), $id);
        if($request->hasFile('photo')) {
            $service=new MediaService();
            $consultant->photo=$service->fileUpload('consultants',$request->photo);
            $consultant->save();
        }  
        return redirect()->back()->with('message', 'Consultant updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Consultant deleted.');
    }
}
