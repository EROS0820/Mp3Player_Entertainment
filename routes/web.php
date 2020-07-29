<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/' , 'HomeController@index')->name('home');
    Route::get('/search/{searchKey}', 'SearchResultController@index')->name('search_result');
    Route::get('/result/{title}', 'DynamicController@index')->name('result');
    //generate calls report
    Route::get('/cals/generate' , 'CalsDisController@generateReport')->name('cals.generate.report');
    Route::get('/cals/get' , 'CalsDisController@getPorts')->name('cals.get');

    Route::post('/search', 'HomeController@search')->name('search');
    Route::post('/suggest_list', 'HomeController@suggest_list')->name('suggest_list');
    $routesContainer = [
        [
            'names' => 'tubidy',
            'name' => 'tubidy',
            'controller' => 'TubidyController',
        ],
        [
            'names' => 'artists',
            'name' => 'artists',
            'controller' => 'ArtistsController',
        ],
        [
            'names' => 'gente',
            'name' => 'gente',
            'controller' => 'GenteController',
        ],
        [
            'names' => 'relac',
            'name' => 'relac',
            'controller' => 'RelacController',
        ],
        [
            'names' => 'calsdis',
            'name' => 'calsdis',
            'controller' => 'CalsDisController',
        ],
    ];

    foreach($routesContainer as $r){
        /**
         * scripts routes
         */
        Route::get('/'.$r['names'] , $r['controller'].'@index')->name($r['names']);
        // store
        Route::post('/'.$r['name'].'/store' , $r['controller'].'@store')->name($r['name'].'.store');
        // show
        Route::get('/'.$r['name'].'/show/{id}' , $r['controller'].'@show')->name($r['name'].'.show');
        // edit
        Route::get('/'.$r['name'].'/edit/{id}' , $r['controller'].'@edit')->name($r['name'].'.edit');
        // update
        Route::post('/'.$r['name'].'/update/{id}' , $r['controller'].'@update')->name($r['name'].'.update');
        // delete
        Route::post('/'.$r['name'].'/delete/{id}' , $r['controller'].'@destroy')->name($r['name'].'.delete');
        // export
        Route::get('/'.$r['names'].'/export/all' , $r['controller'].'@exportAll')->name($r['names'].'.export');
        // import
        Route::post('/'.$r['names'].'/import' , $r['controller'].'@importJson')->name($r['names'].'.import');
    }

    Route::get('/{name}', 'SongerController@display');

