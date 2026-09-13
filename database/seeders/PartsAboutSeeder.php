<?php

namespace Database\Seeders;

use App\Entities\Admin\Part;
use Illuminate\Database\Seeder;

class PartsAboutSeeder extends Seeder
{
  
    public function run()
    {
       
        Part::firstOrCreate([
            'key' => 'about_title',
        ], [
            'title' => 'العنوان الرئيسي',
            'value_en' => 'Our Services to Help You with Your Tenders and Consultations',
            'value_ar' => 'خدماتنا لمساعدتك في مناقصاتك واستشاراتك',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::firstOrCreate([
            'key' => 'about_subtitle',
        ], [
            'title' => 'العنوان الفرعي',
            'value_en' => 'We provide you with the latest daily tender data with precise details in all fields, along with consultations from experts specialized in various industries.',
            'value_ar' => 'نحن نوفر لك أحدث بيانات المناقصات اليومية مع تفاصيل دقيقة في جميع المجالات، بالإضافة إلى استشارات من خبراء متخصصين في مختلف الصناعات.',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::firstOrCreate([
            'key' => 'about_point_1',
        ], [
            'title' => 'النقطة 1',
            'value_en' => 'Daily updated tenders with accurate details.',
            'value_ar' => 'مناقصات محدثة يومياً مع تفاصيل دقيقة.',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::firstOrCreate([
            'key' => 'about_point_2',
        ], [
            'title' => 'النقطة 2',
            'value_en' => 'Specialized consultations in various fields such as construction, technology, and energy.',
            'value_ar' => 'استشارات متخصصة في مجالات متنوعة مثل البناء، التكنولوجيا، والطاقة.',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::firstOrCreate([
            'key' => 'about_point_3',
        ], [
            'title' => 'النقطة 3',
            'value_en' => 'Continuous customer support to ensure you get the most out of our services.',
            'value_ar' => 'خدمة العملاء والدعم المتواصل لضمان استفادتك القصوى من خدماتنا.',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::firstOrCreate([
            'key' => 'about_description',
        ], [
            'title' => 'الوصف',
            'value_en' => 'We help you find the right opportunities and provide the necessary support to make informed decisions through a network of experts and consultants in all fields.',
            'value_ar' => 'نحن نساعدك في العثور على الفرص المناسبة وتوفير الدعم اللازم لاتخاذ القرارات الصائبة من خلال شبكة من الخبراء والمستشارين المتخصصين في جميع المجالات.',
            'type' => 'text',
            'section' => 'about',
        ]);

    }
}
