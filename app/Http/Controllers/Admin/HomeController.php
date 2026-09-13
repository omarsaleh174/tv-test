<?php
namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Entities\Admin\Tender;
use App\Services\PayMobServices;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Request ;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller{

    public function index()
    {
            $data['clients_count']    = \DB::table('clients')->count();
            $data['categories_count'] = \DB::table('categories')->count();
            $data['departments_count'] = \DB::table('departments')->count();
            $data['countries_count']  = \DB::table('countries')->count();
            $data['products_count']   = \DB::table('cities')->count();
            $data['confirmed_count']  = \DB::table('types')->count();
            $data['advisors_count']  = \DB::table('consultants')->count();
            $data['tenders_count']  = \DB::table('tenders')->count();
        
            $latestClients = \DB::table('clients')->latest()->take(6)->get();
            $latestAdvisors  = \DB::table('consultants')->latest()->take(6)->get();
            $latestTenders = \DB::table('tenders')->latest()->take(6)->get();
        
            return view('home', compact('data', 'latestClients', 'latestAdvisors', 'latestTenders'));
        }
     

    public function mail()
    {
        $tenders = Tender::take(6)->get();
        return view('emails.tenders_published', ['tenders' => $tenders]);
    }

}