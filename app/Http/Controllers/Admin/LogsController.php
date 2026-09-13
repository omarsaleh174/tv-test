<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UnitRequest;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\Admin\UnitRepository;
use App\Models\User;

class LogsController extends Controller
{
    protected $repository;

    // $activities = Activity::all();
    public function __construct(Activity $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if($request->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)
            ->editColumn('user', function ($item){$user = User::find($item->causer_id);if($user) return  '<a href="'.route('users.show',$user->id).'">' .$user->email??"". '</a>'; })
            ->editColumn('subject_type', function ($item){return  basename(str_replace('\\', '/', $item->subject_type));;})
            ->addColumn('action',function($item) { return action_form($item,'logs','logs',['show','delete']);})
            ->rawColumns(['user','action'])
            ->toJson();
        }
        return view('admin.logs.index');
    }

    public function show($id)
    {
        $item = $this->repository->find($id);
        return view('admin.logs.show', compact('item'));
    }



    public function destroy($id)
    {
        $deleted = $this->repository->destroy($id);
        return redirect()->back()->with('message', 'Unit deleted.');
    }
}