<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::namespace('Client')->group(function () {

        Route::get('password-reset/{token}/{email}', 'AuthController@showResetForm')
            ->name('password.reset.client');

        Route::get('reset-password', 'AuthController@reset_password')
            ->name('client.password.reset');

        Route::post('send-email-reset', 'AuthController@send_reset_link')
            ->name('client.password.email');

        Route::post('client-password-reset', 'AuthController@reset')
            ->name('password.update');

        Route::get('/login', 'AuthController@login')
            ->name('client.login');

        Route::get('/', 'WelcomeController@index')
            ->name('welcome');

        Route::get('/page-data', 'WelcomeController@page')
            ->name('page');

        Route::get('/about-us', 'WelcomeController@about')
            ->name('about');

        Route::get('/privacy-policy', 'WelcomeController@privacy_policy')
            ->name('privacy.policy');

        Route::get('/tenders', 'WelcomeController@tenders')
            ->name('client.tenders');

        Route::get('/all_consultants', 'WelcomeController@all_consultants')
            ->name('all_consultants');

        Route::get('/articles', 'ArticleController@index')
            ->name('client.all_articles');

        Route::get('/articles/{slug}', 'ArticleController@show')
            ->name('client.one_article');

        Route::post('client/login', 'AuthController@post_login')
            ->name('client.post_login');

        Route::get('register', 'AuthController@register')
            ->name('client.register');

        Route::post('store-contact', 'ClientController@store_contact')
            ->name('client.store-contact');

        Route::middleware('client_auth')->group(function () {

            Route::get('add-tender', 'ClientController@add_tender')
                ->name('client.add_tender');

            Route::get('my-profile', 'AuthController@profile')
                ->name('client.profile');

            Route::post('client-logout', 'AuthController@logout')
                ->name('client.logout');

            Route::post('request-consultation', 'ClientController@request_consultation')
                ->name('client.request_consultation');

            Route::post('store-tenders', 'ClientController@client_tenders_store')
                ->name('client.tenders.store');

            Route::get('/tenders/show/{slug}', 'WelcomeController@one_tenders')
                ->name('client.tender.show');

            Route::get('/tenders/consultants/{slug}', 'WelcomeController@one_consultants')
                ->name('client.consultants.show');

            Route::get('payment/authorised', 'ClientController@paymentAuthorised')
                ->name('client.payment.authorised');

            Route::get('payment/declined', 'ClientController@paymentDeclined')
                ->name('client.payment.declined');

            Route::get('payment/cancelled', 'ClientController@paymentCancelled')
                ->name('client.payment.cancelled');

            Route::get('subscripe/{id}', 'ClientController@subscripe')
                ->name('client.subscripe');

            Route::post('subscription/payment', 'ClientController@startSubscriptionPayment')
                ->name('client.subscription.payment');

            Route::put('/update-profile', 'ClientController@updateProfile')
                ->name('client.updateProfile');

            Route::post('/update-password', 'ClientController@updatePassword')
                ->name('client.updatePassword');
        });
    });

    // Promo Code check must use the logged-in client session.
    Route::middleware('client_auth')->post(
        'promo/check',
        [\App\Http\Controllers\Api\PromoCodeController::class, 'check']
    )->name('client.promo.check');
});
