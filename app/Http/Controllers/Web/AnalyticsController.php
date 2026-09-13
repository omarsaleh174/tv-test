<?php

namespace App\Http\Controllers\Web;

use Google\Client;
use Google\Service\AnalyticsData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalyticsController extends Controller
{
    // تعريف خاصية propertyId لاسترجاع معرّف العقار من الإعدادات
    protected $propertyId;

    public function __construct()
    {
        // تعيين معرّف العقار من ملف الإعدادات
        $this->propertyId = config('analytics.property_id');
    }

    public function getTopPages()
    {
        // تكوين Google Client باستخدام بيانات المصادقة
        $client = new Client();
        $client->setAuthConfig(public_path('settings_folder/fcm.json'));  // مسار ملف fcm.json
        $client->addScope(AnalyticsData::ANALYTICS_READONLY);  // إضافة صلاحية القراءة فقط

        // إعداد خدمة AnalyticsData للوصول إلى تقارير Analytics
        $analytics = new AnalyticsData($client);

        // إعداد الاستعلام للحصول على أكثر الصفحات زيارة
        $request = new \Google\Service\AnalyticsData\RunReportRequest();
        $request->setDimensions([ 
            new \Google\Service\AnalyticsData\Dimension(['name' => 'pagePath']),
        ]);
        $request->setMetrics([
            new \Google\Service\AnalyticsData\Metric(['name' => 'screenPageViews']),
        ]);
        $request->setDateRanges([
            new \Google\Service\AnalyticsData\DateRange(['startDate' => '7daysAgo', 'endDate' => 'today']),
        ]);

        // تنفيذ التقرير واستلام الاستجابة
        $response = $analytics->properties->runReport("properties/{$this->propertyId}", $request);

        // استخراج البيانات من الاستجابة وتحويلها إلى مصفوفة صفحات
        $pages = [];
        foreach ($response->getRows() as $row) {
            $pages[] = [
                'page' => $row->getDimensionValues()[0]->getValue(),  // اسم الصفحة
                'views' => $row->getMetricValues()[0]->getValue(),    // عدد الزيارات
            ];
        }

        // إرجاع البيانات إلى واجهة المستخدم (view) لعرضها
        return view('analytics.top_pages', compact('pages'));
    }
}
