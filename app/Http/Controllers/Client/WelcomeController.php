<?php

namespace App\Http\Controllers\Client;
use Illuminate\Http\Request;
use App\Entities\Admin\CLient;
use App\Entities\Admin\Tender;
use App\Entities\Admin\Category;
use App\Entities\Admin\Consultant;
use App\Entities\Admin\Banner;
use App\Entities\Admin\Article;
use App\Entities\Admin\Department;
use App\Entities\Admin\Subscription;
use App\Http\Controllers\Controller;


class WelcomeController extends Controller
{
   public function index()
{
    try {

        $consultants = Consultant::where('is_visible_on_home',1)->latest()->take(6)->get();

        $tenders = Tender::where(function ($query) {
            $query->whereNull('client_id')
                  ->orWhere(function ($subQuery) {
                      $subQuery->whereNotNull('client_id')
                               ->whereNotNull('approved_by');
                  });
        })->latest()->take(6)->get();

        $subscriptions = Subscription::where('status',1)->get();

        $banners = Banner::where('active',1)->get();

        $latestArticles = Article::where('active',1)
                                 ->latest()
                                 ->take(3)
                                 ->get();

        return view('client.welcome', compact(
            'consultants',
            'tenders',
            'subscriptions',
            'banners',
            'latestArticles'
        ));

    } catch (\Exception $e) {

        dd($e->getMessage());

    }
}

    public function page()
    {
         $consultants = Consultant::latest()->take(6)->get();
         $tenders = Tender::where(function ($query) {$query->whereNull('client_id')->orWhere(function ($subQuery) 
            {$subQuery->whereNotNull('client_id')->whereNotNull('approved_by');});})
         ->latest()->take(6)->get();
         $subscriptions = Subscription::where('status',1)->get();
         
        return view('client.page',compact('consultants','tenders','subscriptions'));
    }
    public function about()
    {
        return view('client.about');
    }
    public function privacy_policy()
    {
        return view('client.privacy_policy');
    }
    public function tenders(Request $request)
    {
        $categories = Category::has('tenders')->get();
        
        // الحصول على country_id و category_id من الطلب
        $countryId = $request->input('country_id');
        $categoryIds = $request->input('category_ids', []);
        
        // بناء الاستعلام
        $tendersQuery = Tender::where(function ($query) {
            $query->whereNull('client_id')
                  ->orWhere(function ($subQuery) {
                      $subQuery->whereNotNull('client_id')
                               ->whereNotNull('approved_by');
                  });
        });
    
        // إضافة فلتر البلد إذا تم تحديده
        if ($countryId) {
            $tendersQuery->where('country_id', $countryId);
        }
    
        // إضافة فلتر الفئات إذا تم تحديدها
        if (!empty($categoryIds)) {
            $tendersQuery->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            });
        }
    
        // الحصول على التندرات بناءً على الفلاتر
        $tenders = $tendersQuery->latest()->take(20)->get();
    
        // إذا كان الطلب عبر AJAX، إعادة التندرات على شكل HTML فقط
        if ($request->ajax()) {
            $html = view('client.tenders_list', compact('tenders'))->render();
            return response()->json(['html' => $html]);
        }
    
        // إذا كان الطلب غير عبر AJAX، إعادة عرض الصفحة كاملة
        return view('client.tenders', compact('tenders', 'categories'));
    }
    
    public function one_tenders($slug)
    {
        $tender = Tender::where('slug',$slug)->first();
        if(!$tender)
        abort(404);
        return view('client.one_tender',compact('tender'));
    }
    public function all_consultants(Request $request)
    {
        $departments =  Department::has('consultants')->get();
        if($request->department_id!=null)
        $consultants = Consultant::where('department_id',$request->department_id)->get();
        else
        $consultants = Consultant::all();
        return view('client.all_consultants',compact('departments','consultants'));
    }


    public function one_consultants($slug)
    {
        $consultant = Consultant::where('slug',$slug)->first();
    
        if(!$consultant)
            abort(404);
    
        return view('client.one_consultant',compact('consultant'));
    }

}
