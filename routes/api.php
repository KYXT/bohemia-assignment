<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group([
        'namespace'     => 'App\Http\Controllers\Api',
        'as'            => 'api',
    ], function ($api) {
        
        // Auth
        $api->group([
            'namespace' => 'Auth'
        ], function ($api) {
            $api->post('register', 'RegisterController@register');
            $api->post('login', 'LoginController@login')->name('login');
            $api->post('logout', 'LoginController@logout');
        });
        
    });
});