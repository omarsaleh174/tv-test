<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SubscriptionRequest;
use App\Repositories\Admin\SubscriptionRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class SubscriptionsController extends Controller
{

    protected $repository;



    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'subscriptions','subscriptions',$this->actions);})->toJson();
        }
        return view('admin.subscriptions.index', );
    }

    public function store(SubscriptionRequest $request)
    {
        $subscription = $this->repository->create($request->all());
        return redirect()->back()->with('message', 'Subscription created.');
    }

    public function show($id)
    {
        $subscription = $this->repository->find($id);
        return view('admin.subscriptions.show', compact('subscription'));
    }


    public function edit($id)
    {
        $subscription = $this->repository->find($id);
        return view('admin.subscriptions.edit', compact('subscription'));
    }


    public function update(SubscriptionRequest $request, $id)
    {
        $subscription = $this->repository->update($request->all(), $id);
        return redirect()->back()->with('message', 'Subscription updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Subscription deleted.');
    }
}
