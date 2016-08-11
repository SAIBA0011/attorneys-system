<?php

Route::group(['middleware' => ['web']], function () {
    // Registration and Login Route.
        Route::auth();

    // AdminController Routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::get('view', ['as' => 'dashboard', 'uses' => 'Admin\AdminController@index']);

    // AdminUserController Routes
        Route::get('users', ['as' => 'users.all', 'uses' => 'Admin\AdminUserController@getUsers']);
        Route::post('user/delete/{id}', ['as' => 'user.destroy', 'uses' => 'Admin\AdminUserController@destroy']);

    // AdminDayController Routes
        Route::get('days/show', ['as' => 'days', 'uses' => 'Admin\AdminDayController@index']);
        Route::get('day/create', ['as' => 'day.create', 'uses' => 'Admin\AdminDayController@create']);
        Route::post('days/store', ['as' => 'days.store', 'uses' => 'Admin\AdminDayController@store']);
        Route::get('days/edit/{id}', ['as' => 'days.edit', 'uses' => 'Admin\AdminDayController@edit']);
        Route::post('days/update/{id}', ['as' => 'days.update', 'uses' => 'Admin\AdminDayController@update']);
        Route::post('days/destroy/{id}', ['as' => 'days.destroy', 'uses' => 'Admin\AdminDayController@destroy']);

    // AdminScheduleController Routes
        Route::get('schedule/{slug}', ['as' => 'schedule', 'uses' => 'Admin\AdminScheduleController@index']);

    // AdminPdfController Routes
        Route::get('pdf', ['as' => 'pdf', 'uses' => 'Admin\AdminPdfController@index']);
        Route::post('pdf/store', ['as' => 'pdf.store', 'uses' => 'Admin\AdminPdfController@store']);
        Route::post('pdf/destroy/{id}', ['as' => 'pdf.destroy', 'uses' => 'Admin\AdminPdfController@destroy']);

    // AdminPlenaryPanelController Routes
        Route::get('plenary/edit/{id}', ['as' => 'plenary.edit', 'uses' => 'Admin\AdminPlenaryPanelController@edit']);
        Route::post('plenary/store/{slug}', ['as' => 'plenary.store', 'uses' => 'Admin\AdminPlenaryPanelController@store']);
        Route::patch('plenary/update/{id}', ['as' => 'plenary.update', 'uses' => 'Admin\AdminPlenaryPanelController@update']);
        Route::post('plenary/destroy/{id}', ['as' => 'plenary.destroy', 'uses' => 'Admin\AdminPlenaryPanelController@destroy']);

    // AdminStreamController Routes
        Route::post('stream.create', ['as' => 'stream.create', 'uses' => 'Admin\AdminStreamController@store']);
        Route::post('stream.destroy/{id}', ['as' => 'stream.destroy', 'uses' => 'Admin\AdminStreamController@destroy']);

    // AdminStreamPanelController Routes
        Route::post('streamPanel.create', ['as' => 'streamPanel.create', 'uses' => 'Admin\AdminStreamPanelController@store']);
        Route::get('streamPanel/edit/{id}', ['as' => 'streamPanel.edit', 'uses' => 'Admin\AdminStreamPanelController@edit']);
        Route::patch('streamPanel/update/{id}', ['as' => 'streamPanel.update', 'uses' => 'Admin\AdminStreamPanelController@update']);
        Route::post('streamPanel/destroy/{id}', ['as' => 'streamPanel.destroy', 'uses' => 'Admin\AdminStreamPanelController@destroy']);

    // AdminSpeakerController Routes
        Route::group(['prefix' => 'speakers', 'as' => 'speakers.'], function(){
            Route::get('/show', ['as' => 'index', 'uses' => 'Admin\AdminSpeakerController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'Admin\AdminSpeakerController@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'Admin\AdminSpeakerController@store']);
            Route::post('/delete', ['as' => 'destroy', 'uses' => 'Admin\AdminSpeakerController@destroy']);
            Route::get('/edit/{username}', ['as' => 'edit', 'uses' => 'Admin\AdminSpeakerController@edit']);
            Route::post('/edit/{username}', ['as' => 'update', 'uses' => 'Admin\AdminSpeakerController@update']);
            Route::post('rating/store/{id}', ['as' => 'rating', 'uses' => 'Frontend\RatingController@store']);
        });

    // AdminSponsorController Routes
        Route::get('sponsors/view', ['as' => 'sponsors.view', 'uses' => 'Admin\AdminSponsorController@index']);
        Route::get('sponsors/create', ['as' => 'sponsors.create', 'uses' => 'Admin\AdminSponsorController@create']);
        Route::post('sponsors/store', ['as' => 'sponsors.store', 'uses' => 'Admin\AdminSponsorController@store']);
        Route::get('sponsors/edit/{id}', ['as' => 'sponsors.edit', 'uses' => 'Admin\AdminSponsorController@edit']);
        Route::post('sponsors/update/{id}', ['as' => 'sponsors.update', 'uses' => 'Admin\AdminSponsorController@update']);
        Route::post('sponsors/delete/{id}', ['as' => 'sponsors.destroy', 'uses' => 'Admin\AdminSponsorController@destroy']);
        Route::get('sponsor/page_content', ['as' => 'sponsors.get_page_content', 'uses' => 'Admin\AdminSponsorController@get_page_content']);
        Route::post('sponsor/page_content', ['as' => 'sponsors.store_page_content', 'uses' => 'Admin\AdminSponsorController@store_page_content']);
        Route::get('sponsor/page_content/edit', ['as' => 'sponsors.edit_page_content', 'uses' => 'Admin\AdminSponsorController@edit_page_content']);
        Route::post('sponsor/page_content/{id}', ['as' => 'sponsors.update_page_content', 'uses' => 'Admin\AdminSponsorController@update_page_content']);

    // AdminPartnerController Routes
        Route::get('partners/show', ['as' => 'partners.show', 'uses' => "Admin\AdminPartnerController@index"]);
        Route::post('partners/store', ['as' => 'partners.store', 'uses' => "Admin\AdminPartnerController@store"]);
        Route::get('partners/create', ['as' => 'partners.create', 'uses' => "Admin\AdminPartnerController@create"]);
        Route::get('partners/edit/{slug}', ['as' => 'partners.edit', 'uses' => "Admin\AdminPartnerController@edit"]);
        Route::post('partners/update/{slug}', ['as' => 'partners.update', 'uses' => "Admin\AdminPartnerController@update"]);
        Route::post('partners/destroy/{slug}', ['as' => 'partners.destroy', 'uses' => "Admin\AdminPartnerController@destroy"]);

    // AdminCategoryController Routes
        Route::get('categories/view', ['as' => 'categories.view', 'uses' => 'Admin\AdminCategoryController@index']);
        Route::post('categories/store', ['as' => 'categories.store', 'uses' => 'Admin\AdminCategoryController@store']);
        Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'Admin\AdminCategoryController@create']);
        Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'Admin\AdminCategoryController@edit']);
        Route::post('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'Admin\AdminCategoryController@update']);
        Route::post('categories/destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'Admin\AdminCategoryController@destroy']);

    // NewsletterController Routes
        Route::get('newsletter/subscribers', ['as' => 'newsletter.subscribers', 'uses' => 'Admin\AdminNewsletterController@index']);
        Route::post('newsletter/store', ['as' => 'newsletter.store', 'uses' => 'Admin\AdminNewsletterController@store']);
        Route::post('newsletter/delete/{id}', ['as' => 'newsletter.delete', 'uses' => 'Admin\AdminNewsletterController@destroy']);

    // PricePlanController Routes
        Route::get('plans/view', ['as' => 'plans.view', 'uses' => 'Admin\AdminPricePlanController@index']);
        Route::post('plans/store', ['as' => 'plan.store', 'uses' => 'Admin\AdminPricePlanController@store']);
        Route::get('plans/create', ['as' => 'plan.create', 'uses' => 'Admin\AdminPricePlanController@create']);
        Route::get('plans/edit/{id}', ['as' => 'plan.edit', 'uses' => 'Admin\AdminPricePlanController@edit']);
        Route::post('plans/update/{id}', ['as' => 'plan.update', 'uses' => 'Admin\AdminPricePlanController@update']);
        Route::post('plans/destroy/{id}', ['as' => 'plan.destroy', 'uses' => 'Admin\AdminPricePlanController@destroy']);

    // PricePlanOptionController Routes
        Route::get('PlanOption/create', ['as' => 'PlanOption.create', 'uses' => 'Admin\AdminPricePlanOptionController@create']);
        Route::post('PlanOption/store', ['as' => 'PlanOption.store', 'uses' => 'Admin\AdminPricePlanOptionController@store']);
        Route::get('PlanOption/edit/{id}', ['as' => 'PlanOption.edit', 'uses' => 'Admin\AdminPricePlanOptionController@edit']);
        Route::post('PlanOption/update/{id}', ['as' => 'PlanOption.update', 'uses' => 'Admin\AdminPricePlanOptionController@update']);
        Route::post('PlanOption/destroy/{id}', ['as' => 'PlanOption.destroy', 'uses' => 'Admin\AdminPricePlanOptionController@destroy']);

    // SettingsController Routes
        Route::get('settings', ['as' => 'settings', 'uses' => 'Admin\AdminSettingsController@index']);

    // AdminSliderController Routes
        Route::get('sliders', ['as' => 'sliders.show', 'uses' => 'Admin\AdminSliderController@index']);
        Route::post('slider/store', ['as' => 'sliders.store', 'uses' => 'Admin\AdminSliderController@store']);
        Route::get('slider/edit/{id}', ['as' => 'slider.edit', 'uses' => 'Admin\AdminSliderController@edit']);
        Route::get('slider/create', ['as' => 'sliders.create', 'uses' => 'Admin\AdminSliderController@create']);
        Route::post('slider/update/{id}', ['as' => 'sliders.update', 'uses' => 'Admin\AdminSliderController@update']);
        Route::post('slider/destroy/{id}', ['as' => 'sliders.destroy', 'uses' => 'Admin\AdminSliderController@destroy']);

    // AdminHomePageContentController Routes
        Route::get('pages/home/show', ['as' => 'pages.home.show', 'uses' => 'Admin\AdminHomePageContentController@index']);
        Route::get('pages/home/create', ['as' => 'pages.home.create', 'uses' => 'Admin\AdminHomePageContentController@create']);
        Route::post('pages/home/store', ['as' => 'pages.home.store', 'uses' => 'Admin\AdminHomePageContentController@store']);
        Route::get('pages/home/edit/{id}', ['as' => 'pages.home.edit', 'uses' => 'Admin\AdminHomePageContentController@edit']);
        Route::post('pages/home/update/{id}', ['as' => 'pages.home.update', 'uses' => 'Admin\AdminHomePageContentController@update']);
        Route::post('pages/home/destroy/{id}', ['as' => 'pages.home.destroy', 'uses' => 'Admin\AdminHomePageContentController@destroy']);

    // AdminAboutUsController Routes
        Route::get('pages/about/create', ['as' => 'pages.about.create', 'uses' => 'Admin\AdminAboutUsController@create']);
        Route::get('pages/about/edit', ['as' => 'pages.about.edit', 'uses' => 'Admin\AdminAboutUsController@edit']);
        Route::post('pages/about/store', ['as' => 'pages.about.store', 'uses' => 'Admin\AdminAboutUsController@store']);
        Route::post('pages/about/update/{id}', ['as' => 'pages.about.update', 'uses' => 'Admin\AdminAboutUsController@update']);

    // AdminEventInformationController Routes
        Route::get('event_information', ['as' => 'event.info', 'uses' => 'Admin\AdminEventInformationController@index'] );
        Route::post('event_store', ['as' => 'event_store', 'uses' => 'Admin\AdminEventInformationController@store'] );
        Route::get('event_edit', ['as' => 'event.edit', 'uses' => 'Admin\AdminEventInformationController@edit'] );
        Route::post('event_update/{id}', ['as' => 'event_update', 'uses' => 'Admin\AdminEventInformationController@update'] );
    });

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
    // MessagesController Routes for User Profile
            Route::get('messages/create', ['as' => 'messages.create', 'uses' => 'Frontend\MessagesController@create']);
            Route::post('messages/create', ['as' => 'messages.store', 'uses' => 'Frontend\MessagesController@store']);
            Route::get('messages/{id}', ['as' => 'messages.show', 'uses' => 'Frontend\MessagesController@show']);
            Route::put('messages/{id}', ['as' => 'messages.update', 'uses' => 'Frontend\MessagesController@update']);
            Route::get('{profile}/messages', ['as' => 'messages', 'uses' => 'Frontend\MessagesController@index']);

    // Profile Friend Routes
            Route::get('{profile}/friends', ['as' => 'friends', 'uses' => 'Frontend\ProfileController@friends']);
            Route::get('{profile}/friend/requests', ['as' => 'friendsRequests', 'uses' => 'Frontend\ProfileController@friendsRequests']);

    // ProfileController Routes
            Route::get('/{profile}', ['as' => 'profile', 'uses' => 'Frontend\ProfileController@index']);
            Route::get('/{profile}/edit', ['as' => 'edit', 'uses' => 'Frontend\ProfileController@edit']);
            Route::post('/{profile}/update', ['as' => 'update', 'uses' => 'Frontend\ProfileController@update']);

    // UserDeleteAccountController Routes
            Route::post('delete_my_account/{id}', ['as' => 'account_delete', 'uses' => 'Frontend\UserDeleteAccountController@destroy']);
        });

        Route::group(['prefix' => 'about', 'as' => 'about.'], function(){
            Route::get('/', ['as' => 'show', 'uses' => 'Frontend\AboutController@index']);
            Route::get('speakers', ['as' => 'speakers', 'uses' => 'Frontend\SpeakerController@index']);
            Route::get('speaker/view/{slug}', ['as' => 'speakers.show', 'uses' => 'Frontend\SpeakerController@show']);
            Route::get('sponsors', ['as' => 'sponsors', 'uses' => 'Frontend\SponsorController@index']);
            Route::get('sponsors/show/{slug}', ['as' => 'sponsors.show', 'uses' => 'Frontend\SponsorController@show']);
            Route::get('partners', ['as' => 'partners', 'uses' => 'Frontend\PartnerController@index']);
            Route::get('partners/show/{slug}', ['as' => 'partners.show', 'uses' => 'Frontend\PartnerController@show']);
        });

    // MemberController Routes
        Route::group(['prefix' => 'members', 'as' => 'members.'], function(){
            Route::get('/', ['as' => 'show', 'uses' => 'Frontend\MembersController@index']);
        });

    // FriendsController Routes
        Route::post('send_a_friend_request/{id}', ['as' => 'send_a_friend_request', 'uses' => 'FriendsController@store']);
        Route::post('accept_friend_request/{id}', ['as' => 'accept_friend_request', 'uses' => 'FriendsController@accept_friend_request']);
        Route::post('deny_friend_request/{id}', ['as' => 'deny_friend_request', 'uses' => 'FriendsController@deny_friend_request']);
        Route::post('unfriend_user/{id}', ['as' => 'unfriend_user', 'uses' => 'FriendsController@unfriend_user']);

    // Forum Controller Routes, Still in process
        Route::group(['prefix' => 'frontend', 'as' => 'frontend.'], function(){
            Route::get('forum', ['as' => 'forum', 'uses' => 'Frontend\ForumController@index']);
            Route::get('forum/create', ['as' => 'forum.create', 'uses' => 'Frontend\ForumController@create']);
            Route::get('forum/store', ['as' => 'forum.store', 'uses' => 'Frontend\ForumController@store']);
        });

    // HomeController Routes
        Route::get('/', ['as' => 'home', 'uses' => 'Frontend\HomeController@index']);

    // ScheduleController Routes
        Route::get('schedule', ['as' => 'schedule', 'uses' => 'Frontend\ScheduleController@index']);

    // BookingsController Routes
        Route::get('bookings', ['as' => 'bookings.show', 'uses'=>'Frontend\BookingController@index']);

    // ContactController Routes
        Route::get('contact', ['as' => 'contact', 'uses' => 'Frontend\ContactController@index']);
        Route::post('contact', ['as' => 'contact.store', 'uses' => 'Frontend\ContactController@store']);
});

Route::get('suspend_users', []);
