<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Entities\Admin\City;
use App\Entities\Admin\Client;
use App\Entities\Admin\Tender;
use App\Entities\Admin\Country;
use App\Entities\Admin\Category;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    
    public function index()
    {
        $totalClients = Client::count();    
        $activeClients = Client::where('active', 1)->count();
        $inactiveClients = Client::where('active', 0)->count();
        $clientsByCountryCategory = [];
        $countries = Country::withCount('clients')->get();
        $categories = Category::withCount('clients')->get();
        foreach ($countries as $country) {
            foreach ($categories as $category) {
                $clientsByCountryCategory[$country->title][$category->title] =$category->clients()->where('country_id', $country->id)->count();
            }
        }
        return view('admin.reports.index', compact('totalClients', 'activeClients', 'inactiveClients', 'clientsByCountryCategory', 'countries', 'categories'));
    }    

    public function show(Request $request,$id)
{
    $query = Client::query();
    $isFiltered = false;
    if ($request->has('country_id') && $request->country_id != '') {
        $query->where('country_id', $request->country_id);
        $isFiltered = true;
    }
    if ($request->has('city_id') && $request->city_id != '') {
        $query->where('city_id', $request->city_id);
        $isFiltered = true;
    }

     if ($request->has('from') && $request->from != '') {
        $query->whereDate('created_at', '>=', $request->from);
        $isFiltered = true;
    }
    
    if ($request->has('to') && $request->to != '') {
        $query->whereDate('created_at', '<=', $request->to);
        $isFiltered = true;
    }


    if ($request->has('category_id') && $request->category_id != '') {
        $query->whereHas('categories', function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        });
        $isFiltered = true;
    }
    if ($request->has('search') && $request->search != '') {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%')
              ->orWhere('phone', 'like', '%' . $request->search . '%');
        });
        $isFiltered = true;
    }
    if (!$isFiltered) {
        return response()->json([
            'message' => 'No filters applied. No data returned.',
            'data' => [],
        ]);
    }
    $clients = $query->get(); 
    return response()->json([
        'message' => 'Filtered data retrieved successfully.',
        'data' => $clients,
    ]);
}
    public function tender_show(Request $request)
{      
    $query = Tender::query();
    $isFiltered = false;
    if ($request->has('country_id') && $request->country_id != '') {
        $query->where('country_id', $request->country_id);
        $isFiltered = true;
    }
    if ($request->has('from') && $request->from != '') {
        $query->whereDate('created_at', '>=', $request->from);
        $isFiltered = true;
    }
    if ($request->has('to') && $request->to != '') {
        $query->whereDate('created_at', '<=', $request->to);
        $isFiltered = true;
    }

    if ($request->has('city_id') && $request->city_id != '') {
        $query->where('city_id', $request->city_id);
        $isFiltered = true;
    }

    if($request->created_at!=null)
     {
	    $query->whereDate('created_at', $request->created_at);
            $isFiltered = true;
    }
   
    if ($request->has('category_id') && $request->category_id != '') {
        $query->whereHas('categories', function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        });
        $isFiltered = true;
    }
    if ($request->has('search') && $request->search != '') {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('tender_code', 'like', '%' . $request->search . '%');
        });
        $isFiltered = true;
    }
    if (!$isFiltered) {
        return response()->json([
            'message' => 'No filters applied. No data returned.',
            'data' => [],
        ]);
    }
    $clients = $query->get(); 
    return response()->json([
        'message' => 'Filtered data retrieved successfully.',
        'data' => $clients,
    ]);
}

public function tender()
{
    $totalTenders    = Tender::count();    
    $not_send_tender = Tender::whereNull('send_at')->count();
    $admin_tender    = Tender::whereNull('client_id')->count();
    $send_tender     = Tender::whereNotNull('send_at')->count();
    $client_tender   = Tender::whereNotNull('client_id')->count();
    $send_today_tender = Tender::whereDate('publication_date', Carbon::today())->count();

    $tendersByCountryCategory = [];
    $countries = Country::withCount('tenders')->get();
    $categories = Category::withCount('tenders')->get();
    foreach ($countries as $country) {
        foreach ($categories as $category) {
            $tendersByCountryCategory[$country->title][$category->title] =$category->tenders()->where('country_id', $country->id)->count();
        }
    }
    return view('admin.reports.tenders', compact('totalTenders','send_today_tender',
    'totalTenders', 'admin_tender', 'client_tender', 'send_tender', 'not_send_tender', 'tendersByCountryCategory', 'countries', 'categories'));
}
}
