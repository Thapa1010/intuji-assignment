<?php

/**
 * Define the application routes and their corresponding controllers and methods with simple guards.
 * 
 * The routes array maps URL paths to specific controller actions and middleware.
 * The structure of each route is:
 * '/path' => ["Controller@method", 'middleware']
 * 
 * Middleware options:
 * 'guest' - Routes that can be accessed by guests (unauthenticated users).
 * 'auth' - Routes that require google authentication.
 */
return [
    //home route
    '/'=>["BaseController@index",'guest'],

    //guest routes
    '/google-login'=>["AuthController@login",'guest'],
    '/google-logout'=>["AuthController@logout",'guest'],
    '/google-callback'=>["AuthController@googleCallback",'guest'],
    '/events'=>["EventController@index",'auth'],

    //auth routes
    '/events/create'=>["EventController@create",'auth'],
    '/events/store'=>["EventController@store",'auth'],
    '/events/delete'=>["EventController@delete",'auth'],
];