<?php

namespace Database\Seeders;

use App\Entities\Admin\Part;
use Illuminate\Database\Seeder;

class PartStateSeeder extends Seeder
{
  
    public function run()
    {
       
        Part::firstOrCreate([
            'key' => 'stats_title',
        ], [
            'title' => 'العنوان الرئيسي',
            'value_en' => 'Our Achievements & Milestones',
            'value_ar' => 'إنجازاتنا ومعالمنا',
            'type' => 'text',
            'section' => 'stats',
        ]);

        // النص الفرعي للقسم
        Part::firstOrCreate([
            'key' => 'stats_subtitle',
        ], [
            'title' => 'النص الفرعي',
            'value_en' => 'We are proud to share the numbers that reflect our success and impact.',
            'value_ar' => 'نفخر بمشاركة الأرقام التي تعكس نجاحنا وتأثيرنا.',
            'type' => 'text',
            'section' => 'stats',
        ]);

        // Happy Clients
        Part::firstOrCreate([
            'key' => 'stats_happy_clients',
        ], [
            'title' => 'العملاء السعداء',
            'value_en' => '232',
            'value_ar' => '232',
            'type' => 'counter',
            'section' => 'stats',
        ]);

        // Projects
        Part::firstOrCreate([
            'key' => 'stats_projects',
        ], [
            'title' => 'المشاريع',
            'value_en' => '521',
            'value_ar' => '521',
            'type' => 'counter',
            'section' => 'stats',
        ]);

        // Hours of Support
        Part::firstOrCreate([
            'key' => 'stats_hours_of_support',
        ], [
            'title' => 'ساعات الدعم',
            'value_en' => '1453',
            'value_ar' => '1453',
            'type' => 'counter',
            'section' => 'stats',
        ]);

        // Hard Workers
        Part::firstOrCreate([
            'key' => 'stats_hard_workers',
        ], [
            'title' => 'العمال الجادين',
            'value_en' => '32',
            'value_ar' => '32',
            'type' => 'counter',
            'section' => 'stats',
        ]);
    }
}
