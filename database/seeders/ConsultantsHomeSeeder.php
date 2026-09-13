<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\Admin\Consultant;

class ConsultantsHomeSeeder extends Seeder
{
    public function run()
    {
        Consultant::updateOrCreate(
            [
                'name' => 'عقار ون أدارة وتسويق العقارات',
            ],
            [
                'title' => 'متخصصون في التسويق وإدارة العقارات التجارية والسكنية',
                'small_description' => 'متخصصون في التسويق وإدارة العقارات التجارية والسكنية',
                'long_description' => 'متخصصون في التسويق وإدارة العقارات التجارية والسكنية',
                'photo' => '1764589976.jfif',
                'is_visible_on_home' => 1,
                'order' => 1,
            ]
        );

        Consultant::updateOrCreate(
            [
                'name' => 'شركة تمكين الشاملة المحدودة',
            ],
            [
                'title' => 'شركة متخصصة في التدريب والاستشارات',
                'small_description' => 'شركة تمكين الشاملة المحدودة',
                'long_description' => 'شركة متخصصة في التدريب والاستشارات',
                'photo' => '1764514688.jpeg',
                'is_visible_on_home' => 1,
                'order' => 2,
            ]
        );

        Consultant::updateOrCreate(
            [
                'name' => 'شركة طارق علي رضا',
            ],
            [
                'title' => 'الإستشارات الهندسية في مجالات الهندسة الكهربائية والهندسة المدنية والهندسة المعمارية',
                'small_description' => 'مستشار هندسي',
                'long_description' => 'الإستشارات الهندسية في مجالات الهندسة الكهربائية والهندسة المدنية والهندسة المعمارية',
                'photo' => '1750762414.png',
                'is_visible_on_home' => 1,
                'order' => 3,
            ]
        );

        Consultant::updateOrCreate(
            [
                'name' => 'المستشار وسيم بن كامل بخش',
            ],
            [
                'title' => 'خبير علاقات أنسانية',
                'small_description' => 'رفع الوعي وتطوير الذات',
                'long_description' => 'رفع الوعي وتطوير الذات',
                'photo' => '1750761117.png',
                'is_visible_on_home' => 1,
                'order' => 4,
            ]
        );

        Consultant::updateOrCreate(
            [
                'name' => 'توب فيجن لتقنية المعلومات',
            ],
            [
                'title' => 'متخصصون في الشبكات والانترنت',
                'small_description' => 'مستشار حاسب الي و انترنت',
                'long_description' => 'مستشار حاسب الي و انترنت',
                'photo' => '1735583630.jpeg',
                'is_visible_on_home' => 1,
                'order' => 5,
            ]
        );

        Consultant::updateOrCreate(
            [
                'name' => 'مازن بن عبد الوهاب كردي',
            ],
            [
                'title' => 'خدمات المحاماه والاستشارات',
                'small_description' => 'المستشار القانوني مازن بن عبد الوهاب كردي',
                'long_description' => 'المستشار القانوني مازن بن عبد الوهاب كردي',
                'photo' => '1735583146.jpeg',
                'is_visible_on_home' => 1,
                'order' => 6,
            ]
        );
    }
}