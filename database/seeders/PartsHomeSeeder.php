<?php

namespace Database\Seeders;

use App\Entities\Admin\Part;
use Illuminate\Database\Seeder;

class PartsHomeSeeder extends Seeder
{
    public function run()
    {
        Part::updateOrCreate(
            ['key' => 'hero_title'],
            [
                'title' => 'العنوان الرئيسي',
                'value_en' => 'Consultations, investment opportunities and tenders',
                'value_ar' => 'الاستشارات والفرص الاستثمارية والمناقصات',
                'type' => 'text',
                'section' => 'hero',
            ]
        );

        Part::updateOrCreate(
            ['key' => 'hero_subtitle'],
            [
                'title' => 'العنوان الفرعي',
                'value_en' => 'Get advice from the best specialists, with privacy and information on investment opportunities and tenders.',
                'value_ar' => 'احصل على استشارات من أفضل المتخصصين، مع الخصوصية ومعلومات عن الفرص الاستثمارية والمناقصات.',
                'type' => 'text',
                'section' => 'hero',
            ]
        );

        Part::updateOrCreate(
            ['key' => 'tender_building'],
            [
                'title' => 'أيقونة 1 - مناقصات البناء',
                'value_en' => 'Building Tenders',
                'value_ar' => 'مناقصات البناء',
                'type' => 'text',
                'section' => 'hero',
            ]
        );

        Part::updateOrCreate(
            ['key' => 'tender_it'],
            [
                'title' => 'أيقونة 2 - مناقصات تقنية المعلومات',
                'value_en' => 'Information Technology Tenders',
                'value_ar' => 'مناقصات تقنية المعلومات',
                'type' => 'text',
                'section' => 'hero',
            ]
        );

        Part::updateOrCreate(
            ['key' => 'tender_energy'],
            [
                'title' => 'أيقونة 3 - مناقصات الطاقة',
                'value_en' => 'Energy Tenders',
                'value_ar' => 'مناقصات الطاقة',
                'type' => 'text',
                'section' => 'hero',
            ]
        );

        Part::updateOrCreate(
            ['key' => 'consulting_financial'],
            [
                'title' => 'أيقونة 4 - استشارات مالية',
                'value_en' => 'Financial Consulting',
                'value_ar' => 'استشارات مالية',
                'type' => 'text',
                'section' => 'hero',
            ]
        );

        Part::updateOrCreate(
            ['key' => 'consulting_legal'],
            [
                'title' => 'أيقونة 5 - استشارات قانونية',
                'value_en' => 'Legal Consulting',
                'value_ar' => 'استشارات قانونية',
                'type' => 'text',
                'section' => 'hero',
            ]
        );

        Part::updateOrCreate(
            ['key' => 'policy'],
            [
                'title' => 'السياسة',
                'value_en' => 'Policy',
                'value_ar' => 'السياسة',
                'type' => 'text',
                'section' => 'policy',
            ]
        );
    }
}
