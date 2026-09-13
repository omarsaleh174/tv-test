<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\MediaService;
use App\Http\Requests\ClientRequest;
use App\Repositories\Admin\ClientRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class ClientsController extends Controller
{

    protected $repository;



    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
        $item = $this->repository->getQuery()->whereNull('deleted_at');
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'clients','clients',$this->actions);})->toJson();
        }
        return view('admin.clients.index', );
    }

    public function store(ClientRequest $request)
    {
        $client = $this->repository->create($request->all());
        if($request->hasFile('photo')) {
            $service=new MediaService();
            $client->photo=$service->fileUpload('clients',$request->photo);
            $client->save();
        }
        return redirect()->back()->with('message', 'Client created.');
    }

    public function show($id)
    {
        $client = $this->repository->find($id);
        return view('admin.clients.show', compact('client'));
    }


    public function edit($id)
    {
        $client = $this->repository->find($id);
        return view('admin.clients.edit', compact('client'));
    }


    public function update(ClientRequest $request, $id)
    {
        $client = $this->repository->update($request->all(), $id);
        if($request->password)
        {
            $client->password = $request->password;
        }
        if($request->hasFile('photo')) {
            $service=new MediaService();
            $client->photo=$service->fileUpload('clients',$request->photo);
        }
        if ($request->category_id) {
             $client->categories()->syncWithoutDetaching($request->category_id);
        }


        $client->save();
        return redirect()->back()->with('message', 'Client updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Client deleted.');
    }
}
