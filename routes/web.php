<?php

return [
    '/'=>["BaseController@index",'guest'],
    '/google-login'=>["AuthController@login",'guest'],
    '/google-logout'=>["AuthController@logout",'guest'],
    '/google-callback'=>["AuthController@googleCallback",'guest'],
    '/events'=>["EventController@index",'auth'],
];