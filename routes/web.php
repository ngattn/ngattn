<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PageController@index')->name('index');

Auth::routes();

//Route::group(['middleware'=>['auth']], function () {
Route::group(['middleware'=>['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
    Route::resource('categories', 'CategoryController')->middleware(['can:admin']);
//    Route::resource('categories', 'CategoryController');
    Route::resource('type-products', 'TypeProductController')->middleware(['can:admin']);
    Route::resource('products', 'ProductController')->middleware(['can:admin']);
    Route::get('products/ajax/idCategory/{idCateqory}', 'ProductController@getTypeProduct')->middleware(['can:admin']);
    Route::get('products/delete/{id}', 'ProductController@getDelete')->middleware(['can:admin']);
    Route::get('products/edit/{id}', 'ProductController@getEdit')->middleware(['can:admin']);
    Route::post('products/edit/{id}', 'ProductController@postEdit')->middleware(['can:admin']);
    Route::get('products/delImg/{id}', 'ProductController@getDelImg')->middleware(['can:admin']);
//    Route::resource('slides', 'SlideController')->middleware(['can:guest']);
Route::resource('slides', 'SlideController')->middleware(['can:admin']);
    Route::get('slides/delete/{id}', 'SlideController@getDelete')->middleware(['can:admin']);
    Route::resource('users', 'UserController')->middleware(['can:admin']);
    Route::get('users/delete/{id}', 'UserController@getDelete')->middleware(['can:admin']);
    Route::get('news', 'New24hController@getNew24h')->name('news')->middleware(['can:admin']);
    Route::get('news/create', 'New24hController@getNew24hAdd')->name('newAdd')->middleware(['can:admin']);
    Route::post('news/store', 'New24hController@getNew24hStore')->name('newStore')->middleware(['can:admin']);
    Route::get('news/delete/{id}', 'New24hController@getDelete')->middleware(['can:admin']);

    Route::get('/get-post-chart-data', 'ChartDataController@getMonthlyPostData')->middleware(['can:admin']);
    Route::resource('bill', 'BillController')->middleware(['can:admin']);
    Route::get('deleteBill/{id}', 'BillController@deleteBill')->middleware(['can:admin']);
    Route::get('don-hang','StatisticController@listOrder')->middleware(['can:admin']);
    Route::get('don-hang-chua-xu-ly','StatisticController@chuaxuly')->middleware(['can:admin']);
    Route::get('don-hang-chua-giao','StatisticController@chuagiao')->middleware(['can:admin']);
    Route::get('don-hang-dang-giao','StatisticController@danggiao')->middleware(['can:admin']);
    Route::get('don-hang-da-giao','StatisticController@dagiao')->middleware(['can:admin']);
    Route::get('don-hang-da-huy','StatisticController@huy')->middleware(['can:admin']);
    Route::get('deleteBillStatus/{id}', 'StatisticController@deleteBillStatus')->middleware(['can:admin']);
    Route::resource('introduces', 'IntroduceController')->middleware(['can:admin']);
    Route::resource('services', 'ServiceController')->middleware(['can:admin']);
    Route::get('services/delete/{id}', 'ServiceController@getDelete')->middleware(['can:admin']);
    Route::get('bill-guest/{id}', 'BillController@getBillGuest')->middleware(['can:guest']);
    Route::get('thong-ke-don-hang', 'ChartController@getBill')->middleware(['can:admin']);
    Route::get('ajax-thong-ke-doanh-thu', 'DoanhThuController@getMonthlyPostData')->middleware(['can:admin']);
    Route::get('thong-ke-doanh-thu', 'DoanhThuController@getdoanhthu')->middleware(['can:admin']);
Route::resource('contacts', 'ContactController')->middleware(['can:admin']);
    Route::get('ajax-thong-ke-don-hang-huy', 'DoanhThuController@getBillCancel')->middleware(['can:admin']);
    Route::get('thong-ke-don-hang-huy', 'DoanhThuController@getdonhuy')->middleware(['can:admin']);
    Route::resource('feedback-user', 'FeedbackUserController')->middleware(['can:admin']);
    Route::get('deleteFeedBack/{id}', 'FeedbackUserController@deleteFeedBack')->middleware(['can:admin']);
//});

Route::get('chi-tiet-san-pham/{idct}/{slug}.html', 'PageController@getDetail');
Route::get('/mua-hang/{id}', 'PageController@muahang')->name('muahang');
Route::get('gio-hang', ['as'=>'giohang', 'uses'=>'PageController@giohang']);
Route::get('/update', 'PageController@getUpdateCart');
Route::get('xoa-san-pham/{id}', ['as'=>'xoasanpham', 'uses'=>'PageController@xoasanpham']);
Route::get('xoa-san-pham-trong gh/{id}', ['as'=>'xoasanphamtronggiohang', 'uses'=>'PageController@xoasanphamtronggiohang']);
Route::get('dat-hang', ['as'=>'dathang', 'uses'=>'PageController@getCheckOut']);
Route::post('dat-hang', ['as'=>'dathang', 'uses'=>'PageController@postCheckOut']);
Route::get('tin-tuc/{slug}', ['as'=>'tintuc', 'uses'=>'PageController@getTinTuc']);
Route::get('loai-san-pham/{id}/{slug}.html', ['as'=>'loaisanpham', 'uses'=>'PageController@getLoaiSanPham']);

Route::get('addcart', 'PageController@addcart')->name('addcart');
Route::get('addcartApp', 'PageController@addcart')->name('addcartApp');
Route::get('addcartAppCate', 'PageController@addcart')->name('addcartAppCate');
Route::get('cart', 'PageController@cart')->name('cart');
Route::get('addcartHome', 'PageController@addcartHome')->name('addcartHome');
Route::get('gioi-thieu', 'PageController@introduce')->name('gioithieu');
Route::get('dịch-vụ', 'PageController@service')->name('dichvu');
Route::get('dịch-vụ/chi-tiet-dịch-vụ/{id}/{slug}.html', 'PageController@getservice');
Route::get('tin-tuc', 'PageController@allNew')->name('allNews');
Route::get('tin-tuc/chi-tiet-tin-tu/{id}/{slug}.html', 'PageController@gettin');
Route::get('search-product', 'PageController@searchProduct')->name('addcart');
Route::get('lien-he', 'PageController@contact');
Route::get('gop-y', ['as'=>'gop-y', 'uses'=>'PageController@getgopy']);
Route::post('gop-y', ['as'=>'gop-y', 'uses'=>'PageController@postgopy']);

