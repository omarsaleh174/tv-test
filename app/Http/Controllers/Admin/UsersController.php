<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\MediaService;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Admin\UserRepository;

class UsersController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item) { return action_form($item,'users','users',$this->actions);})->rawColumns(['action'])->toJson();            
        }
        return view('web.users.index');
    }

    public function store(UserCreateRequest $request)
    {
            $user = $this->repository->create($request->only( 'name', 'email','phone','photo',)+['type'=>1]);
            $user->password = $request->password;
            if($request->hasFile('photo')){
                $secvice=new MediaService();
                $user->photo=$secvice->fileUpload('users',$request->photo);
            }
            $user->save();
            return redirect()->back()->with('message', 'User created');
    }

    public function show($id)
    {
        $user = $this->repository->find($id);
        return view('web.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);
        return view('web.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
            $user = $this->repository->update($request->except(['password']), $id);
            $request->password!=null?$user->password =$request->password:'';
             return redirect()->back()->with('message', 'User updated');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'User deleted.');
    }

    public function __invoke($id) {
        $user = $this->repository->findorFail($id);
        $active=$user->active==1?0:1;
        $user->active=$active;
        $user->save();
        $message=$user->active==1?'unsuspended':'Suspended';
        return redirect()->back()->with('message', 'User '.$message);
    }


}
