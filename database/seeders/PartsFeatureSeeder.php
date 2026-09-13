<?php

namespace Database\Seeders;

use App\Entities\Admin\Part;
use Illuminate\Database\Seeder;

class PartsFeatureSeeder extends Seeder
{
  
    public function run()
    {
       
         
        Part::firstOrCreate([
            'key' => 'features_title',
        ], [
            'title' => 'العنوان الرئيسي',
            'value_en' => 'Daily Updated Tenders',
            'value_ar' => 'مناقصات يومية محدثة',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_subtitle',
        ], [
            'title' => 'العنوان الفرعي',
            'value_en' => 'We provide you with new tenders data daily with all the necessary details to help you make the right decisions.',
            'value_ar' => 'نقدم لك بيانات المناقصات الجديدة يومياً مع كافة التفاصيل الضرورية لمساعدتك في اتخاذ قراراتك المناسبة.',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_item_1_title',
        ], [
            'title' => 'عنوان الميزة 1',
            'value_en' => 'Daily Updated Tenders',
            'value_ar' => 'مناقصات يومية محدثة',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_item_1_desc',
        ], [
            'title' => 'وصف الميزة 1',
            'value_en' => 'We provide you with new tenders daily with all the necessary details to assist in making the right decisions.',
            'value_ar' => 'نقدم لك بيانات المناقصات الجديدة يومياً مع كافة التفاصيل الضرورية لمساعدتك في اتخاذ قراراتك المناسبة.',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_item_2_title',
        ], [
            'title' => 'عنوان الميزة 2',
            'value_en' => 'Specialized Consultations',
            'value_ar' => 'استشارات متخصصة',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_item_2_desc',
        ], [
            'title' => 'وصف الميزة 2',
            'value_en' => 'We offer expert consultants in various fields to guide you through tenders and make informed decisions.',
            'value_ar' => 'نحن نوفر لك مستشارين خبراء في مختلف المجالات لتوجيهك في المناقصات واتخاذ القرارات السليمة.',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_item_3_title',
        ], [
            'title' => 'عنوان الميزة 3',
            'value_en' => 'Continuous Support',
            'value_ar' => 'دعم مستمر',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_item_3_desc',
        ], [
            'title' => 'وصف الميزة 3',
            'value_en' => 'We provide 24/7 support through multiple channels to ensure you receive the best possible service.',
            'value_ar' => 'نوفر لك دعماً متواصلاً على مدار الساعة عبر قنوات متعددة لضمان حصولك على أفضل خدمة ممكنة.',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_item_4_title',
        ], [
            'title' => 'عنوان الميزة 4',
            'value_en' => 'Customized Solutions',
            'value_ar' => 'حلول مخصصة',
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::firstOrCreate([
            'key' => 'features_item_4_desc',
        ], [
            'title' => 'وصف الميزة 4',
            'value_en' => 'We offer tailored solutions based on your specific needs in the field of tenders and consultations.',
            'value_ar' => 'نقدم لك حلولاً مخصصة بناءً على احتياجاتك الخاصة في عالم المناقصات والاستشارات.',
            'type' => 'text',
            'section' => 'features',
        ]);


        Part::firstOrCreate([
            'key' => 'cta_title',
        ], [
            'title' => 'العنوان الرئيسي',
            'value_en' => 'Start Today with the Best Opportunities',
            'value_ar' => 'ابدأ اليوم مع أفضل الفرص',
            'type' => 'text',
            'section' => 'call_to_action',
        ]);

        Part::firstOrCreate([
            'key' => 'cta_subtitle',
        ], [
            'title' => 'العنوان الفرعي',
            'value_en' => 'Join us to get the latest tender data and expert consultations in all fields, and take your steps towards success.',
            'value_ar' => 'انضم إلينا للحصول على أحدث بيانات المناقصات واستشارات من خبراء في جميع المجالات، وابدأ في اتخاذ خطواتك نحو النجاح.',
            'type' => 'text',
            'section' => 'call_to_action',
        ]);

        Part::firstOrCreate([
            'key' => 'cta_button_text',
        ], [
            'title' => 'نص الزر',
            'value_en' => 'Browse Tenders Now',
            'value_ar' => 'استعرض المناقصات الآن',
            'type' => 'text',
            'section' => 'call_to_action',
        ]);

        Part::firstOrCreate([
            'key' => 'cta_button_login_text',
        ], [
            'title' => 'نص زر تسجيل الدخول',
            'value_en' => 'Browse Tenders Now',
            'value_ar' => 'استعرض المناقصات الآن',
            'type' => 'text',
            'section' => 'call_to_action',
        ]);
        
    }
}
