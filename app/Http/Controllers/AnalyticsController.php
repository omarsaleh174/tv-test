<?php

namespace App\Http\Controllers;

use Spatie\Analytics\Analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    // Show general analytics data like visits
    public function index()
    {
        // Get the last 30 days of data
        $analyticsData = \Spatie\Analytics\AnalyticsFacade::fetchVisitorsAndPageViews(30);

        return view('analytics.index', compact('analyticsData'));
    }

    // Fetch specific data for a given date range
    public function show(Request $request)
    {
        // Validate the start and end date
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Fetch the data for the provided date range
        $analyticsData = \Spatie\Analytics\AnalyticsFacade::fetchVisitorsAndPageViews($request->start_date, $request->end_date);

        return view('analytics.show', compact('analyticsData'));
    }

    // Fetch real-time visitors
    public function realTime()
    {
        // Fetch real-time active users
        $realTimeData = \Spatie\Analytics\AnalyticsFacade::fetchRealTime();

        return view('analytics.realtime', compact('realTimeData'));
    }
}
