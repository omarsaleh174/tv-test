<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\Admin\Part;

class AboutUsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Part::firstOrCreate([
            'key' => 'about_section_title',
        ], [
            'title' => 'العنوان عن القسم',
            'value_en' => 'Our Services to Assist You in Your Tenders and Consultations',
            'value_ar' => 'خدماتنا لمساعدتك في مناقصاتك واستشاراتك',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::firstOrCreate([
            'key' => 'about_section_description',
        ], [
            'title' => 'وصف القسم',
            'value_en' => 'We provide you with the latest daily tender data with detailed information in all fields, along with consultations from experts in various industries.',
            'value_ar' => 'نحن نوفر لك أحدث بيانات المناقصات اليومية مع تفاصيل دقيقة في جميع المجالات، بالإضافة إلى استشارات من خبراء متخصصين في مختلف الصناعات.',
            'type' => 'text',
            'section' => 'about',
        ]);

        // List of Services (for bullet points)
        $services = [
            'updated_tenders' => [
                'title' => 'مناقصات محدثة يومياً مع تفاصيل دقيقة.',
                'description_en' => 'Tenders updated daily with accurate details.',
                'description_ar' => 'مناقصات محدثة يومياً مع تفاصيل دقيقة.',
            ],
            'specialized_consulting' => [
                'title' => 'استشارات متخصصة في مجالات متنوعة مثل البناء، التكنولوجيا، والطاقة.',
                'description_en' => 'Specialized consulting in various fields like construction, technology, and energy.',
                'description_ar' => 'استشارات متخصصة في مجالات متنوعة مثل البناء، التكنولوجيا، والطاقة.',
            ],
            'customer_support' => [
                'title' => 'خدمة العملاء والدعم المتواصل لضمان استفادتك القصوى من خدماتنا.',
                'description_en' => 'Customer service and continuous support to ensure maximum benefit from our services.',
                'description_ar' => 'خدمة العملاء والدعم المتواصل لضمان استفادتك القصوى من خدماتنا.',
            ],
            
        ];

        foreach ($services as $key => $service) {
            Part::firstOrCreate([
                'key' => "about_{$key}_title",
            ], [
                'title' => 'عنوان الخدمة',
                'value_en' => $service['title'],
                'value_ar' => $service['title'],
                'type' => 'text',
                'section' => 'about',
            ]);

            Part::firstOrCreate([
                'key' => "about_{$key}_description",
            ], [
                'title' => 'وصف الخدمة',
                'value_en' => $service['description_en'],
                'value_ar' => $service['description_ar'],
                'type' => 'text',
                'section' => 'about',
            ]);
        }


        // Services Section
        Part::firstOrCreate([
            'key' => 'services_title',
        ], [
            'title' => 'عنوان الخدمات',
            'value_en' => 'Our Services',
            'value_ar' => 'خدماتنا',
            'type' => 'text',
            'section' => 'services',
        ]);

        // List each individual service including 'general_tenders' and 'administrative_consulting'
        $services = [
            'general_tenders' => [
                'title' => 'المناقصات العامة',
                'description_en' => 'Displaying all tenders in various fields with comprehensive details about dates, locations, and application methods.',
                'description_ar' => 'عرض جميع المناقصات في مختلف المجالات مع تفاصيل شاملة عن التواريخ، الأماكن، وطريقة التقديم.',
            ],
            'administrative_consulting' => [
                'title' => 'استشارات إدارية',
                'description_en' => 'Administrative consulting services help you plan and organize your business for the best tender offers.',
                'description_ar' => 'خدمات استشارية إدارية تساعدك في تخطيط وتنظيم أعمالك للحصول على أفضل العروض في المناقصات.',
            ],
            'legal_consulting' => [
                'title' => 'استشارات قانونية',
                'description_en' => 'We provide specialized legal consultations to help you understand tender conditions and submit applications professionally.',
                'description_ar' => 'نقدم استشارات قانونية متخصصة لمساعدتك في فهم شروط المناقصات والتقديم عليها بكل احترافية.',
            ],
            'financial_consulting' => [
                'title' => 'استشارات مالية',
                'description_en' => 'Specialized consultants offer financial advice on tenders and projects to ensure maximum benefit.',
                'description_ar' => 'مستشارون متخصصون يقدمون لك استشارات مالية حول المناقصات والمشروعات لضمان تحقيق أقصى استفادة.',
            ],
            'management_consulting' => [
                'title' => 'استشارات إدارية',
                'description_en' => 'Administrative consulting services help you plan and organize your work to get the best offers in tenders.',
                'description_ar' => 'خدمات استشارية إدارية تساعدك في تخطيط وتنظيم أعمالك للحصول على أفضل العروض في المناقصات.',
            ],
            'project_management' => [
                'title' => 'إدارة المشاريع',
                'description_en' => 'We assist in managing your projects effectively through specialized advice in planning, implementation, and supervision.',
                'description_ar' => 'نساعدك في إدارة مشاريعك بفعالية من خلال استشارات متخصصة في التخطيط والتنفيذ والإشراف.',
            ],
            'customer_support' => [
                'title' => 'دعم العملاء والمساعدة',
                'description_en' => 'A specialized team is available to answer your inquiries and assist you in understanding tenders and how to apply smoothly and quickly.',
                'description_ar' => 'فريق متخصص للرد على استفساراتك ومساعدتك في فهم المناقصات وكيفية التقديم بشكل سلس وسريع.',
            ],
        ];

        foreach ($services as $key => $service) {
            Part::firstOrCreate([
                'key' => "service_{$key}_title",
            ], [
                'title' => 'عنوان الخدمة',
                'value_en' => $service['title'],
                'value_ar' => $service['title'],
                'type' => 'text',
                'section' => 'services',
            ]);

            Part::firstOrCreate([
                'key' => "service_{$key}_description",
            ], [
                'title' => 'وصف الخدمة',
                'value_en' => $service['description_en'],
                'value_ar' => $service['description_ar'],
                'type' => 'text',
                'section' => 'services',
            ]);
        }
    }
}
