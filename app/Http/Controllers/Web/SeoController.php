<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests\SeoRequest;
use App\Http\Controllers\Controller;
class SeoController extends Controller
{

public function index()
{
    $jsonPath = public_path('settings_folder/seo.json');
    $seo = json_decode(file_get_contents($jsonPath), true);
    return view('admin.settings.seo', compact('seo'));
}


    public function store(SeoRequest $request)
    {
        $jsonPath = public_path('settings_folder/seo.json');
        $seos = json_decode(file_get_contents($jsonPath), true);
        $seos['site_title'] = $request->site_title;
        $seos['site_description'] = $request->site_description;
        $seos['site_keywords'] = explode(',', $request->site_keywords);
        $seos['home_page_title'] = $request->home_page_title;
        $seos['home_page_description'] = $request->home_page_description;
        $seos['home_page_keywords'] = explode(',', $request->home_page_keywords);
        $seos['tender_page_title'] = $request->tender_page_title;
        $seos['tender_page_description'] = $request->tender_page_description;
        $seos['tender_page_keywords'] = explode(',', $request->tender_page_keywords);
        $seos['consultant_page_title'] = $request->consultant_page_title;
        $seos['consultant_page_description'] = $request->consultant_page_description;
        $seos['consultant_page_keywords'] = explode(',', $request->consultant_page_keywords);
        $seos['contact_page_title'] = $request->contact_page_title;
        $seos['contact_page_description'] = $request->contact_page_description;
        $seos['contact_page_keywords'] = explode(',', $request->contact_page_keywords);
        $seos['footer_copyright'] = $request->footer_copyright;
        $seos['footer_privacy_policy'] = $request->footer_privacy_policy;
        $seos['footer_terms_of_service'] = $request->footer_terms_of_service;
        $seos['social_media_facebook'] = $request->social_media_facebook;
        $seos['social_media_twitter'] = $request->social_media_twitter;
        $seos['social_media_linkedin'] = $request->social_media_linkedin;
        $seos['social_media_instagram'] = $request->social_media_instagram;
        $seos['footer_address'] = $request->footer_address;
        $seos['footer_city'] = $request->footer_city;
        $seos['footer_phone'] = $request->footer_phone;
        $seos['footer_email'] = $request->footer_email;

        file_put_contents($jsonPath, json_encode($seos, JSON_PRETTY_PRINT));    
            return redirect()->back()->with('message', 'Seo updated successfully!');
    }


}
