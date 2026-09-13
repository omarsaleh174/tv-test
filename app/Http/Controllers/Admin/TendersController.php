<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Requests\TenderRequest;
use App\Repositories\Admin\TenderRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class TendersController extends Controller
{

    protected $repository;



    public function __construct(TenderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if(request()->wantsJson()) {
            $item = $this->repository->whereNull('client_id')->getQuery();
            if($request->country_id!=null)
            $item->where('country_id',$request->country_id);   
        if($request->type!=null)
            $item->where('type',$request->type);   
        if($request->created_at!=null)
            $item->whereDate('created_at', $request->created_at);   
        if($request->status==1)
            $item->whereNull('send_at');   
        if($request->status==2)
        $item->whereNotNull('send_at');   

            // if ($request->category_id != null) {
            //     $item->whereHas('categories', function($query) use ($request) {
            //         $query->where('categories.id', $request->category_id);
            //     });
            // }
    
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'tenders','tenders',$this->actions);})->toJson();
        }
        return view('admin.tenders.index', );
    }
    public function client_tenders(Request $request)
    {
        if(request()->wantsJson()){
            $item = $this->repository->whereNotNull('client_id')->getQuery();
            if($request->client_id!=null)
            $item->where('client_id',$request->client_id);
        if($request->type!=null)
            $item->where('type',$request->type);
        if($request->created_at!=null)
            $item->whereDate('created_at', $request->created_at);
        if($request->status==1)
            $item->whereNull('send_at');   
        if($request->status==2)
            $item->whereNotNull('send_at');
            return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'tenders','tenders',['show','edit','delete','approved']);})->toJson();
        }
        $publicationDate = $this->calc_send_time();
        return view('admin.tenders.client_tenders',compact('publicationDate') );
    }
    
    public function store(TenderRequest $request)
    {
         $tender = $this->repository->create($request->all());
         $tender->categories()->attach($request->category_id);
         if($request->publication_date==null)
         {
            $tender->publication_date=$this->calc_send_time();
            $tender->save();
         }
         return redirect()->back()->with('message', 'Tender created.');
    }

    public function show($id)
    {
        $tender = $this->repository->find($id);
        return view('admin.tenders.show', compact('tender'));
    }


    public function edit($id)
    {
        $tender = $this->repository->find($id);
        return view('admin.tenders.edit', compact('tender'));
    }

    public function create()
    {
      $publicationDate = $this->calc_send_time();
        return view('admin.tenders.create',compact('publicationDate'));
    }

    public function update(TenderRequest $request, $id)
    {
        $tender = $this->repository->update($request->all(), $id);
        $tender->categories()->sync($request->category_id);
        return redirect()->back()->with('message', 'Tender updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Tender deleted.');
    }

    public function approve(Request $request)
    {
         $tender = $this->repository->find($request->tender_id);
        $tender->approved_by  = auth()->user()->id;
        $tender->publication_date  = $request->approval_date;
        $tender->save();
        return response()->json([ 'success' => true, 'message' => 'تم الموافقه بنجاح', ]);    
    
    }

    private function calc_send_time()
    {

        $baseDate = Carbon::parse(getSendDate('first_date'));
        $daysSinceBase = now()->diffInDays($baseDate);
        $periodsPassed = floor($daysSinceBase / getSendDate('day_send_tender'));
        $nextPublicationDate = $baseDate->addDays(($periodsPassed + 1) * getSendDate('day_send_tender'));
        return  Carbon::parse($nextPublicationDate->toDateString() . ' ' . getSendDate('time_send_tender'));

        
        // $newDate = Carbon::now()->addDays(getSettingValue('day_send_tender'));
        // list($hours, $minutes) = explode(':', getSettingValue('time_send_tender'));
        // $newDate->setHour($hours)->setMinute($minutes)->setSecond(0);
        // $publicationDate = $newDate->toIso8601String();  
        // $publicationDate = substr($publicationDate, 0, 16);  
        // return $publicationDate;
    } 
    }
