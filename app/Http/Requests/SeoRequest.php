<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        // Site-level validation
            'site_title' => 'required|string|max:255',
            'site_description' => 'required|string|max:1000',
            'site_keywords' => 'required|string',

        // Home Page SEO
            'home_page_title' => 'required|string|max:255',
            'home_page_description' => 'required|string|max:1000',
            'home_page_keywords' => 'required|string',

        // Tender Page SEO
            'tender_page_title' => 'required|string|max:255',
            'tender_page_description' => 'required|string|max:1000',
            'tender_page_keywords' => 'required|string',

        // Consultant Page SEO
            'consultant_page_title' => 'required|string|max:255',
            'consultant_page_description' => 'required|string|max:1000',
            'consultant_page_keywords' => 'required|string',

        // Contact Page SEO
            'contact_page_title' => 'required|string|max:255',
            'contact_page_description' => 'required|string|max:1000',
            'contact_page_keywords' => 'required|string',

        // Footer Information
            'footer_copyright' => 'required|string|max:255',
            'footer_privacy_policy' => 'required|string|max:255',
            'footer_terms_of_service' => 'required|string|max:255',

        // Social Media Links
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ];
    }
}
