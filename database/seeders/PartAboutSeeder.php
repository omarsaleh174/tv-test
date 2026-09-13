<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\Admin\Part;

class PartAboutSeeder extends Seeder
{ 
    public function run()
    {
        Part::updateOrCreate([
            'key' => 'about_title',
        ], [
            'title' => 'العنوان الرئيسي للقسم',
            'value_en' => 'Our Services to Help You with Your Tenders and Consultations',
            'value_ar' => 'خدماتنا لمساعدتك في مناقصاتك واستشاراتك',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::updateOrCreate([
            'key' => 'about_subtitle',
        ], [
            'title' => 'العنوان الفرعي للقسم',
            'value_en' => 'We provide you with the latest tender data daily with accurate details in all fields.',
            'value_ar' => 'نحن نوفر لك أحدث بيانات المناقصات اليومية مع تفاصيل دقيقة في جميع المجالات.',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::updateOrCreate([
            'key' => 'about_service_1',
        ], [
            'title' => 'الخدمة 1',
            'value_en' => 'Daily updated tenders with detailed information.',
            'value_ar' => 'مناقصات محدثة يومياً مع تفاصيل دقيقة.',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::updateOrCreate([
            'key' => 'about_service_2',
        ], [
            'title' => 'الخدمة 2',
            'value_en' => 'Consultations in various fields such as construction, technology, and energy.',
            'value_ar' => 'استشارات متخصصة في مجالات متنوعة مثل البناء، التكنولوجيا، والطاقة.',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::updateOrCreate([
            'key' => 'about_service_3',
        ], [
            'title' => 'الخدمة 3',
            'value_en' => 'Customer service and ongoing support to ensure you benefit fully from our services.',
            'value_ar' => 'خدمة العملاء والدعم المتواصل لضمان استفادتك القصوى من خدماتنا.',
            'type' => 'text',
            'section' => 'about',
        ]);

        Part::updateOrCreate([
            'key' => 'about_description',
        ], [
            'title' => 'الوصف العام للقسم',
            'value_en' => 'We help you find the right opportunities and provide the necessary support to make informed decisions through a network of experts and consultants in all fields.',
            'value_ar' => 'نحن نساعدك في العثور على الفرص المناسبة وتوفير الدعم اللازم لاتخاذ القرارات الصائبة من خلال شبكة من الخبراء والمستشارين المتخصصين في جميع المجالات.',
            'type' => 'text',
            'section' => 'about',
        ]);













        Part::updateOrCreate([
            'key' => 'cta_title',
        ], [
            'title' => 'عنوان قسم CTA',
            'value_en' => 'Start Today with the Best Opportunities',
            'value_ar' => 'ابدأ اليوم مع أفضل الفرص',
            'type' => 'text',
            'section' => 'call_to_action',
        ]);

        Part::updateOrCreate([
            'key' => 'cta_description',
        ], [
            'title' => 'وصف قسم CTA',
            'value_en' => 'Join us to get the latest tender data and consultations from experts in all fields, and take your steps towards success.',
            'value_ar' => 'انضم إلينا للحصول على أحدث بيانات المناقصات واستشارات من خبراء في جميع المجالات، وابدأ في اتخاذ خطواتك نحو النجاح.',
            'type' => 'text',
            'section' => 'call_to_action',
        ]);

        Part::updateOrCreate([
            'key' => 'cta_button_text_logged_in',
        ], [
            'title' => 'نص الزر عندما يكون المستخدم مسجلاً',
            'value_en' => 'Browse Tenders Now',
            'value_ar' => 'استعرض المناقصات الآن',
            'type' => 'text',
            'section' => 'call_to_action',
        ]);

        Part::updateOrCreate([
            'key' => 'cta_button_text_logged_out',
        ], [
            'title' => 'نص الزر عندما يكون المستخدم غير مسجل',
            'value_en' => 'Browse Tenders Now',
            'value_ar' => 'استعرض المناقصات الآن',
            'type' => 'text',
            'section' => 'call_to_action',
        ]);










        Part::updateOrCreate([
            'key' => 'stats_title',
        ], [
            'title' => 'عنوان قسم الإحصائيات',
            'value_en' => 'Our Achievements and Stats', // عنوان القسم باللغة الإنجليزية
            'value_ar' => 'إنجازاتنا وإحصائياتنا', // عنوان القسم باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'stats_description',
        ], [
            'title' => 'وصف قسم الإحصائيات',
            'value_en' => 'Here are some key statistics showcasing our success and dedication to providing top-notch services across various sectors.', // الوصف باللغة الإنجليزية
            'value_ar' => 'إليك بعض الإحصائيات الرئيسية التي تعرض نجاحنا واهتمامنا بتقديم خدمات من الدرجة الأولى عبر مختلف القطاعات.', // الوصف باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        // إضافة إحصائيات العملاء السعداء
        Part::updateOrCreate([
            'key' => 'happy_clients_count',
        ], [
            'title' => 'عدد العملاء السعداء',
            'value_en' => '350', // عدد العملاء السعداء باللغة الإنجليزية
            'value_ar' => '350', // عدد العملاء السعداء باللغة العربية
            'type' => 'number',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'happy_clients_title',
        ], [
            'title' => 'عنوان العملاء السعداء',
            'value_en' => 'Happy Clients', // عنوان العملاء السعداء باللغة الإنجليزية
            'value_ar' => 'العملاء السعداء', // عنوان العملاء السعداء باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'happy_clients_description',
        ], [
            'title' => 'وصف العملاء السعداء',
            'value_en' => 'We have successfully served hundreds of clients, ensuring satisfaction and high-quality outcomes.', // الوصف باللغة الإنجليزية
            'value_ar' => 'لقد خدمنا مئات العملاء بنجاح، مما يضمن رضاهم وتحقيق نتائج عالية الجودة.', // الوصف باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        // إضافة إحصائيات المشاريع
        Part::updateOrCreate([
            'key' => 'projects_count',
        ], [
            'title' => 'عدد المشاريع',
            'value_en' => '120', // عدد المشاريع باللغة الإنجليزية
            'value_ar' => '120', // عدد المشاريع باللغة العربية
            'type' => 'number',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'projects_title',
        ], [
            'title' => 'عنوان المشاريع',
            'value_en' => 'Projects', // عنوان المشاريع باللغة الإنجليزية
            'value_ar' => 'المشاريع', // عنوان المشاريع باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'projects_description',
        ], [
            'title' => 'وصف المشاريع',
            'value_en' => 'We have completed over 120 projects with successful outcomes and satisfied clients across various industries.', // الوصف باللغة الإنجليزية
            'value_ar' => 'لقد أكملنا أكثر من 120 مشروعًا مع نتائج ناجحة وعملاء راضين في مختلف الصناعات.', // الوصف باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        // إضافة إحصائيات ساعات الدعم
        Part::updateOrCreate([
            'key' => 'support_hours_count',
        ], [
            'title' => 'عدد ساعات الدعم',
            'value_en' => '3500', // عدد ساعات الدعم باللغة الإنجليزية
            'value_ar' => '3500', // عدد ساعات الدعم باللغة العربية
            'type' => 'number',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'support_hours_title',
        ], [
            'title' => 'عنوان ساعات الدعم',
            'value_en' => 'Hours Of Support', // عنوان ساعات الدعم باللغة الإنجليزية
            'value_ar' => 'ساعات الدعم', // عنوان ساعات الدعم باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'support_hours_description',
        ], [
            'title' => 'وصف ساعات الدعم',
            'value_en' => 'We have provided over 3500 hours of support to our clients, ensuring that every need is addressed promptly and professionally.', // الوصف باللغة الإنجليزية
            'value_ar' => 'لقد قدمنا أكثر من 3500 ساعة دعم لعملائنا، مما يضمن تلبية كل احتياج بسرعة واحترافية.', // الوصف باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        // إضافة إحصائيات العمال الجادين
        Part::updateOrCreate([
            'key' => 'hard_workers_count',
        ], [
            'title' => 'عدد العمال الجادين',
            'value_en' => '50', // عدد العمال الجادين باللغة الإنجليزية
            'value_ar' => '50', // عدد العمال الجادين باللغة العربية
            'type' => 'number',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'hard_workers_title',
        ], [
            'title' => 'عنوان العمال الجادين',
            'value_en' => 'Hard Workers', // عنوان العمال الجادين باللغة الإنجليزية
            'value_ar' => 'العمال الجادين', // عنوان العمال الجادين باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);

        Part::updateOrCreate([
            'key' => 'hard_workers_description',
        ], [
            'title' => 'وصف العمال الجادين',
            'value_en' => 'Our team consists of 50 dedicated workers who consistently push boundaries and deliver results beyond expectations.', // الوصف باللغة الإنجليزية
            'value_ar' => 'فريقنا يتكون من 50 عاملًا مجتهدًا يدفعون الحدود باستمرار ويحققون نتائج تفوق التوقعات.', // الوصف باللغة العربية
            'type' => 'text',
            'section' => 'stats',
        ]);


        Part::updateOrCreate([
            'key' => 'subscription_text', // استخدام مفتاح 'subscription_text'
        ], [
            'title' => 'نص الاشتراك', // العنوان (يمكنك تجاهله أو تخصيصه)
            'value_en' => 'You can now subscribe with us to enjoy the best services and benefits.', // النص بالإنجليزية
            'value_ar' => 'يمكنك الآن الاشتراك معنا للتمتع بأفضل الخدمات والمزايا.', // النص بالعربية
            'type' => 'text', // نوع البيانات (نص)
            'section' => 'subscription', // القسم (تخصيصه هنا مثلاً لقسم الاشتراك)
        ]);



        Part::updateOrCreate([
            'key' => 'feature_daily_tenders_title', // المفتاح الخاص
        ], [
            'title' => 'عنوان ميزة المناقصات اليومية',
            'value_en' => 'Updated Daily Tenders', // العنوان باللغة الإنجليزية
            'value_ar' => 'مناقصات يومية محدثة', // العنوان باللغة العربية
            'type' => 'text', // نوع البيانات
            'section' => 'features', // القسم
        ]);

        Part::updateOrCreate([
            'key' => 'feature_daily_tenders_description',
        ], [
            'title' => 'وصف ميزة المناقصات اليومية',
            'value_en' => 'We provide you with updated tender data every day, including all the necessary details to help you make informed decisions.', // الوصف بالإنجليزية
            'value_ar' => 'نقدم لك بيانات المناقصات الجديدة يومياً مع كافة التفاصيل الضرورية لمساعدتك في اتخاذ قراراتك المناسبة.', // الوصف بالعربية
            'type' => 'text',
            'section' => 'features',
        ]);

        // ميزة "استشارات متخصصة"
        Part::updateOrCreate([
            'key' => 'feature_specialized_consulting_title',
        ], [
            'title' => 'عنوان ميزة الاستشارات المتخصصة',
            'value_en' => 'Specialized Consulting', // العنوان بالإنجليزية
            'value_ar' => 'استشارات متخصصة', // العنوان بالعربية
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::updateOrCreate([
            'key' => 'feature_specialized_consulting_description',
        ], [
            'title' => 'وصف ميزة الاستشارات المتخصصة',
            'value_en' => 'We provide you with expert consultants in various fields to guide you in tenders and help you make sound decisions.', // الوصف بالإنجليزية
            'value_ar' => 'نحن نوفر لك مستشارين خبراء في مختلف المجالات لتوجيهك في المناقصات واتخاذ القرارات السليمة.', // الوصف بالعربية
            'type' => 'text',
            'section' => 'features',
        ]);

        // ميزة "دعم مستمر"
        Part::updateOrCreate([
            'key' => 'feature_continuous_support_title',
        ], [
            'title' => 'عنوان ميزة الدعم المستمر',
            'value_en' => 'Continuous Support', // العنوان بالإنجليزية
            'value_ar' => 'دعم مستمر', // العنوان بالعربية
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::updateOrCreate([
            'key' => 'feature_continuous_support_description',
        ], [
            'title' => 'وصف ميزة الدعم المستمر',
            'value_en' => 'We provide continuous support 24/7 through various channels to ensure you receive the best possible service.', // الوصف بالإنجليزية
            'value_ar' => 'نوفر لك دعماً متواصلاً على مدار الساعة عبر قنوات متعددة لضمان حصولك على أفضل خدمة ممكنة.', // الوصف بالعربية
            'type' => 'text',
            'section' => 'features',
        ]);

        // ميزة "حلول مخصصة"
        Part::updateOrCreate([
            'key' => 'feature_custom_solutions_title',
        ], [
            'title' => 'عنوان ميزة الحلول المخصصة',
            'value_en' => 'Custom Solutions', // العنوان بالإنجليزية
            'value_ar' => 'حلول مخصصة', // العنوان بالعربية
            'type' => 'text',
            'section' => 'features',
        ]);

        Part::updateOrCreate([
            'key' => 'feature_custom_solutions_description',
        ], [
            'title' => 'وصف ميزة الحلول المخصصة',
            'value_en' => 'We provide tailored solutions based on your specific needs in the world of tenders and consultations.', // الوصف بالإنجليزية
            'value_ar' => 'نقدم لك حلولاً مخصصة بناءً على احتياجاتك الخاصة في عالم المناقصات والاستشارات.', // الوصف بالعربية
            'type' => 'text',
            'section' => 'features',
        ]);
    }
}
