<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/", function () {
    return view('util.main');
});

//Route::get('/logout', function (Request $request) {
//    $request->session()->getId()
//    return view('logout');
//});
/*
 * ------------------------------admin routes
 * */
Route::get('/admin/home_user', ['middleware'=>'auth','uses'=>'adminController@getAdminHome_User']);
Route::get('/admin/user_detail/{id}',['middleware'=>'auth','uses'=>'adminController@getAdmin_user_detail']);

Route::get('/admin/home_activity',['middleware'=>'auth','uses'=>'adminController@getAdminHome_Activity']);
Route::get('/admin/activity_detail/{id}',['middleware'=>'auth','uses'=>'adminController@getAdmin_activity_detail']);

Route::post('/admin/del_user/{id}','adminController@postDelUser');
Route::post('/admin/del_activity/{id}','adminController@postDelActivity');

/*
----------------------------------auth routes--------------------------------------------------
*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/loginValid', 'Auth\AuthController@loginValid');
Route::get('auth/registerSuccess', function(){
    return view('auth.registerSuccess');
});


Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/*
----------------------------------user routes--------------------------------------------------
*/
Route::get('/user/home', ['middleware'=>'auth','uses'=>'UserController@getShowUserHome']);
Route::post('/user/home', ['middleware'=>'auth','uses'=>'UserController@postShowUserHome']);
Route::post('/user/createMood','UserController@postCreateMood');

Route::get('/user/upload_portrait', ['middleware'=>'auth','uses'=>'UserController@getUpload_portrait']);
Route::post('/user/upload_portrait', ['middleware'=>'auth','uses'=>'UserController@postUpload_portrait']);

Route::get('/user/info',['middleware'=>'auth','uses'=>'UserController@getInfo']);
Route::post('/user/info',['middleware'=>'auth','uses'=>'UserController@postInfo']);


//重新设置密码
Route::get('/password/reset/{token}',['middleware'=>'auth','uses'=>'UserController@getChange_psw']);
Route::post('/password/reset',['middleware'=>'auth','uses'=>'UserController@postChange_psw']);



/*
----------------------------------activity routes--------------------------------------------------
*/
Route::get('/activity/all/{page?}',['middleware'=>'auth','uses'=>'ActivityController@getActivity']);
Route::get('/activity/my_activity',['middleware'=>'auth','uses'=>'ActivityController@getMyActivity']);
Route::get('/activity/cancel/{id}',['middleware'=>'auth','uses'=>'ActivityController@getCancelActivity']);


Route::get('/activity/info/{id}',['middleware'=>'auth','uses'=>'ActivityController@getDetailInfo']);
Route::get('/activity/getIn/{id}',['middleware'=>'auth','uses'=>'ActivityController@getInActivity']);

Route::get('/activity/create',['middleware'=>'auth','uses'=>'ActivityController@getCreate']);
Route::post('/activity/create',['middleware'=>'auth','uses'=>'ActivityController@postCreate']);


/*
 * ------------------------------advice routes---------------------------------------------------
 */
Route::get('/advice/home/{page?}',['middleware'=>'auth','uses'=>'AdviceController@getHome']);
Route::get('/advice/import',['middleware'=>'auth','uses'=>'AdviceController@importFile']);
Route::get('/advice/like/{page}/{id}',['middleware'=>'auth','uses'=>'AdviceController@getLike']);
Route::get('/advice/unlike/{page}/{id}',['middleware'=>'auth','uses'=>'AdviceController@getUnlike']);
Route::post('/advice/create','AdviceController@postCreateAdvice');

Route::get('/advice/delete/{id}','AdviceController@getDeleteAdvice');
Route::get('/advice/my_advice','AdviceController@getMyAdvice');

Route::post('/advice/importFile','AdviceController@postImportFile');

/*
 * -----------------------------health routs--------------------------------------------------------
 */
//Route::get('/health/home',['middware'=>'auth','uses'=>'HealthController@getHealthHome']);
Route::get('/health/home', function(){
    return view('health.home');
});
