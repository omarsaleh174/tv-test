<?php 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\ChatsController; 
use App\Http\Controllers\Client\WelcomeController; 
use App\Entities\Admin\Tender; 
use App\Entities\Admin\Client; 
use App\Notifications\TenderPublished; 
 
 
Route::get('/', [WelcomeController::class, 'index'])->name('home'); 

Route::get('/test_dataaaaaaaaaaaa', function () { 
     
    $tenders = Tender::where('publication_date', '<=', now()) 
        ->where(function ($query) { 
            $query->whereNull('client_id')->orWhere(function ($subQuery) {
                $subQuery->whereNotNull('client_id')->whereNotNull('approved_by');
            }); 
        })->get(); 
         
    if (getSettingValue('is_free') == 1) { 
        $clients = Client::where('active', 1)->get(); 
    } else { 
        $clients = Client::where('active', 1)->where('end_subscription', '>=', now())->get(); 
    } 

    foreach ($clients as $client) { 

        $clientTenders = $tenders->filter(function ($tender) use ($client) { 
            $hasCommonCategories = $tender->categories->pluck('id')->intersect($client->categories->pluck('id'))->isNotEmpty(); 
            $matchesCountry = $tender->country_id ? $tender->country_id == $client->country_id : true; 
            return $hasCommonCategories && $matchesCountry; 
        }); 

        if ($client->id == 29) { 
                     
            $data = Tender::whereHas('categories', function ($query) use ($client) { 
                $query->whereIn('category_id', $client->categories->pluck('id'));
            })->where('country_id', $client->country_id)->get(); 

            $client->notify(new TenderPublished($data)); 

            return count($data); 
        } 
    } 
 
}); 
 
use App\Http\Controllers\AnalyticsController; 
 
Route::get('/analytics', [AnalyticsController::class, 'index']); 
Route::get('/analytics/show', [AnalyticsController::class, 'show']); 
Route::get('/analytics/realtime', [AnalyticsController::class, 'realTime']); 
 
Route::get('/test', 'Admin\HomeController@test')->name('test'); 
Route::get('/mail', 'Admin\HomeController@mail')->name('mail'); 
Route::get('/most', 'Web\AnalyticsController@getTopPages')->name('getTopPages'); 
 
 
Route::group(['prefix' => LaravelLocalization::setLocale()], function(){ 
   
  Route::prefix('web')->middleware(['auth'])->namespace('Web')->group(function () { 

    Route::resource('roles', 'RoleController'); 
    Route::get('user/assign-roled/{id}', 'RoleController@assign_role')->name('user.assign.role'); 
    Route::post('user/assign_roled/{id}', 'RoleController@post_assign_role')->name('post.user.assign.role'); 
   
    Route::resource('parts', 'PartsController'); 
    Route::resource('photos', 'PhotosController'); 
    Route::resource('settings', 'SettingsController'); 
    Route::post('settings-date', 'SettingsController@storeDate')->name('settings.date.store'); 
    Route::resource('seo', 'SeoController'); 

    Route::middleware(['auth'])->namespace('Admin')->group(function () {         
    }); 
     
  }); 


  Route::prefix('dashboard')->group(function () { 

    Auth::routes(['register' => false]); 

    Route::middleware(['auth'])->namespace('Admin')->group(function () {         
 
      Route::post('banner-store', 'BannersController@banner_store')->name('photos.banner_store'); 

      Route::get('/home', function () { return redirect()->route('promo-codes.index'); })->name('dashboard.home'); 
      Route::get('/', function () { return redirect()->route('promo-codes.index'); })->name('dashboard'); 
     
      Route::resource('consultants', 'ConsultantsController'); 
      Route::resource('articles', 'ArticlesController'); 
      Route::resource('classifications', 'ClassificationsController'); 

      Route::get('vip/consultants', 'ConsultantsController@vip')->name('vip-consultants.index'); 
      Route::post('vip-update/consultants', 'ConsultantsController@vip_update')->name('vip-consultants.update'); 

      Route::resource('departments', 'DepartmentsController'); 
      Route::resource('consultations', 'ConsultationsController'); 
      Route::resource('clients', 'ClientsController'); 
      Route::resource('tenders', 'TendersController'); 

      Route::get('client_tenders', 'TendersController@client_tenders')->name('client_tenders.index'); 
      Route::post('tender-suspend', 'TendersController@approve')->name('client_tenders.approve'); 

      Route::resource('categories', 'CategoriesController'); 
      Route::resource('/logs', 'LogsController'); 
      Route::resource('countries', 'CountriesController'); 
      Route::resource('cities', 'CitiesController'); 
      Route::resource('types', 'TypesController'); 
      Route::resource('subscriptions', 'SubscriptionsController'); 

      Route::resource('promo-codes', 'PromoCodeController'); 

      Route::resource('/profile', 'ProfileController'); 
      Route::resource('banners', 'BannersController'); 
      Route::resource('reports', 'ReportsController'); 

      Route::get('tender-reports', 'ReportsController@tender')->name('tender-reports'); 
      Route::get('tender-reports-show', 'ReportsController@tender_show')->name('tenders.reports.show'); 

      Route::get('orders/{id}/details', 'OrdersController@getOrderDetails')->name('orders.details'); 
      Route::resource('orders', 'OrdersController'); 

      Route::resource('users', 'UsersController'); 
      Route::get('users/suspend/{id}', 'UsersController')->name('users.suspend'); 

    }); 
 
  }); 

}); 