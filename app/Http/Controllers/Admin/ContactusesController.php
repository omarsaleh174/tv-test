<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ContactUsRequest;
use App\Repositories\Admin\ContactUsRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class ContactusesController extends Controller
{

    protected $repository;



    public function __construct(ContactUsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'contact_us','contact_us',$this->actions);})->toJson();
        }
        return view('admin.contact_us.index', );
    }

    public function store(ContactUsRequest $request)
    {
        $contact = $this->repository->create($request->all());
        return redirect()->back()->with('message', 'ContactUs created.');
    }

    public function show($id)
    {
        $contact = $this->repository->find($id);
        return view('admin.contact_us.show', compact('contact'));
    }


    public function edit($id)
    {
        $contact = $this->repository->find($id);
        return view('admin.contact_us.edit', compact('contact'));
    }


    public function update(ContactUsRequest $request, $id)
    {
        $contact = $this->repository->update($request->all(), $id);
        return redirect()->back()->with('message', 'ContactUs updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'ContactUs deleted.');
    }
}

