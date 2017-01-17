<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('front.master');
});

// Admin
Route::group(['namespace'=>'Backoffice','prefix'=>'backoffice'],function(){
    // Login page
    Route::group(['middleware'=>'guest:admin'],function(){
        Route::get('/',['as'=>'bo.login','uses'=>'LoginCont@index']);
        Route::post('/',['as'=>'bo.login.post','uses'=>'LoginCont@login']);
    });

    Route::get('role_select',['as'=>'bo.role_select','uses'=>'DashboardCont@role_select']);
    Route::post('role_select',['as'=>'bo.role_select.post','uses'=>'DashboardCont@role_select_post']);

    Route::group(['middleware'=>['auth:admin','hasmanyrole']],function(){
        // Role Select page

        // Logout
        Route::get('logout',['as'=>'bo.logout','uses'=>'LoginCont@logout']);

        // Dashboard
        Route::group(['prefix'=>'dashboard','middleware'=>'access:dashboard'],function(){
            Route::get('/',['as'=>'bo.dashboard','uses'=>'DashboardCont@index']);

            Route::get('editprofile',['as'=>'bo.editprofile','uses'=>'DashboardCont@edit']);
            Route::post('editprofile',['as'=>'bo.editprofile.post','uses'=>'DashboardCont@update']);
        });

        // User manager
        Route::group(['prefix'=>'usermanager','middleware'=>'access:usermanager'],function(){
            Route::get('lists',['as'=>'bo.user.lists','uses'=>'UserCont@lists']);
            Route::get('roles',['as'=>'bo.user.roles','uses'=>'UserCont@roles']);

            Route::get('getRoleByUser/{id}',['as'=>'bo.user.list.get_role','uses'=>'UserCont@getRoleByUser']);

            Route::get('edit/{id}',['as'=>'bo.user.edit','uses'=>'UserCont@edit']);
            Route::post('edit/{id}',['as'=>'bo.user.update','uses'=>'UserCont@update']);

            Route::get('edit_role/{id}',['as'=>'bo.user.role.edit','uses'=>'UserCont@edit_role']);
            Route::post('edit_role/{id}',['as'=>'bo.user.role.update','uses'=>'UserCont@update_role']);

            Route::get('add',['as'=>'bo.user.add','uses'=>'UserCont@add']);
            Route::post('add',['as'=>'bo.user.add.post','uses'=>'UserCont@do_add']);

            Route::get('delete/{id}',['as'=>'bo.user.delete','uses'=>'UserCont@delete']);

            Route::post('add_role',['as'=>'bo.role.add','uses'=>'UserCont@add_role']);
            Route::get('delete_role/{role_id}',['as'=>'bo.role.delete','uses'=>'UserCont@delete_role']);

            Route::get('menu',['as'=>'bo.user.menu','uses'=>'UserCont@menumanager']);

            Route::get('getsubmenu/{menu_id}','UserCont@getSubMenu');

            Route::post('addmenu','UserCont@addmenu');
            Route::post('addsubmenu/{menuid}','UserCont@addsubmenu');
        });

        // Client manager
        Route::group(['prefix'=>'clientmanager','middleware'=>'access:clientmanager'],function(){
            Route::get('add',['as'=>'bo.client.add','uses'=>'ClientCont@add']);
            Route::post('add',['as'=>'bo.client.add.post','uses'=>'ClientCont@doAdd']);

            Route::get('lists',['as'=>'bo.client.lists','uses'=>'ClientCont@lists']);
            Route::get('suspended',['as'=>'bo.client.suspended','uses'=>'ClientCont@suspended']);

            Route::get('dosuspend/{id}',['as'=>'bo.client.do_suspend','uses'=>'ClientCont@doSuspend']);
            Route::get('dodelete/{id}',['as'=>'bo.client.do_delete','uses'=>'ClientCont@doDelete']);
            Route::get('dorestore/{id}',['as'=>'bo.client.do_restore','uses'=>'ClientCont@doRestore']);
        });

        // Token manager
        Route::group(['prefix'=>'tokenmanager','middleware'=>'access:tokenmanager'],function(){
            Route::get('/',['as'=>'bo.token.index','uses'=>'TokenCont@index']);
            Route::get('generate',['as'=>'bo.token.generate','uses'=>'TokenCont@generate']);
            Route::get('refresh/{id}',['as'=>'bo.token.refresh','uses'=>'TokenCont@refresh']);
            Route::get('delete/{id}',['as'=>'bo.token.delete','uses'=>'TokenCont@delete']);
            Route::get('suspend/{id}',['as'=>'bo.token.suspend','uses'=>'TokenCont@suspend']);
            Route::get('restore/{id}',['as'=>'bo.token.restore','uses'=>'TokenCont@restore']);
            Route::get('update_limit/{id}/{limit}',['as'=>'bo.token.update_limit','uses'=>'TokenCont@update_limit']);
        });
    });

    // JAL
    Route::get('jal',function(){
        return \App\Libs\Bo::can(1888);
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index');
