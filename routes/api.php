<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->group(['prefix' => 'v1'],function () use ($router){

    $router->group(['prefix' => 'province'], function () use($router) {
        $router->get('get/all',['uses' => 'Province\GetAllController']);
        $router->get('get/province/zone',['uses' => 'Province\GetProvinceByIdZone']);
        $router->get('search',['uses' => 'Province\SearchProvinceController']);
    });

    $router->group(['prefix' => 'city'], function () use($router) {
//        $router->get('get/all',['uses' => 'Province\GetAllController']);
        $router->get('get/city/province',['uses' => 'City\GetCityByIdProvince']);
        $router->get('search',['uses' => 'City\SearchCityController']);
    });

    $router->group(['prefix' => 'destination'], function () use($router) {
//        $router->get('get/all',['uses' => 'Province\GetAllController']);
        $router->get('get/destination/city',['uses' => 'Destination\GetDestinationByIdCity']);
        $router->get('search',['uses' => 'Destination\SearchDestinationController']);
        $router->get('search/quick',['uses' => 'Destination\SearchDestinationQuick']);
    });

    $router->group(['prefix' => 'user'], function () use($router) {
//        $router->get('get/all',['uses' => 'Province\GetAllController']);
        $router->post('login',['uses' => 'User\LoginUserController']);
        $router->put('logout',['uses' => 'User\LogoutUserController']);
    });

    $router->group(['prefix' => 'comment'], function () use($router) {
        $router->post('destination/add',['uses' => 'Comment\DestinationAddController']);
        $router->get('destination/get',['uses' => 'Comment\DestinationGetAllController']);

    });


});

