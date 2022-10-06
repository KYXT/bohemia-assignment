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
    
        $api->group(['middleware' => 'auth:api'], function ($api) {
            
            //Admin panel
            $api->group(
                [
                    'middleware' => 'moderator',
                    'namespace' => 'Admin',
                    'prefix' => 'admin',
                ],
                function ($api) {
                    //Posts
                    $api->group(
                        [
                            'prefix' => 'posts',
                        ],
                        function ($api) {
                            $api->post('store', 'PostController@store');
                            
                            //Admin
                            $api->group(
                                [
                                    'middleware' => 'admin',
                                ],
                                function ($api) {
                                    $api->post('delete/{slug}', 'PostController@delete');
                                }
                            );
                        }
                    );
                }
            );
        });
    });
});