<?php

use App\Dvproduct;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Order;
use App\Expense;
use Carbon\Carbon;
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

Route::get('/', function () {
    return view('welcome');
});

        Auth::routes();

        Route::group(['middleware'=>['auth','admin']],function (){

    Route::get('/admin', function () {


        $products= Product::sum('costperone');

        $dvproducts = Dvproduct::sum('quantity');

        $orders = DB::table('orders')->get();

        $deliveredorders = DB::table('orders')->where('order_status','=','Delivered')->get();

        $floss = Order::where('order_status','=','Delivered')->sum('totalprice') ;


       $current_month_orders = Order::whereMonth('created_at', Carbon::now()->month)->count();

       $last_month_orders = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(1))->count();

       $before_last_month_orders = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(2))->count();


//       percentage

        $delivered = Order::where('order_status','=','Delivered')->count();
        $total = Order::count();
        $deliveredperc =  $total == 0 ? 0 :$delivered / $total * 100;


        $returned = Order::where('order_status','=','Returned')->count();
        $refused = Order::where('order_status','=','Refused')->count();
        $rr = $refused + $returned;
        $refusedperc = $total == 0 ? 0 :$rr / $total * 100;


        $onway = Order::where('order_status','=','Shipping')->count();
        $onwayperc =  $total == 0 ? 0 : $onway/$total * 100;

        $new = Order::where('order_status','=','new')->count();
        $newperc =  $total == 0 ? 0 : $new/$total * 100;

        $noanswer = Order::where('order_status','=','Nanswer')->count();
        $noanswerperc =  $total == 0 ? 0 : $noanswer/$total * 100;


        $confirmed = Order::where('order_status','=','Confirmed')->count();
        $confirmedperc =  $total == 0 ? 0 :  $confirmed/$total * 100;

        return view('admin.dashboard',compact('floss','orders','deliveredorders','products','dvproducts','current_month_orders','last_month_orders','before_last_month_orders','deliveredperc','refusedperc','onwayperc','newperc','noanswerperc','delivered','rr','onway','new','noanswer','confirmed','confirmedperc'));
    });





    Route::get('/deliverer','Admin\Userscontroller@deliverers')->name('deliverers');

    Route::resource('admin/users','Admin\UsersController' , ['except'=>['create']]);

    Route::get('profile','Admin\UsersController@profile' );

    Route::resource('products','Admin\ProductsController' );

    Route::resource('orders','Admin\OrdersController' );

    Route::get('deliverer/{id}/products', 'Admin\ProductsController@showdvprd');

    Route::post('lol', 'Admin\ProductsController@storedvproduct')->name('lol');

    Route::post('adddv','Admin\Userscontroller@adddv')->name('adddv');

    Route::delete('admin/dvs/{dv} ','Admin\Userscontroller@dltdv')->name('dltdv');

    Route::POST('check-current-pwd','Admin\Userscontroller@chkCurrentPassword');

    Route::POST('updateCurrentPassword','Admin\Userscontroller@updateCurrentPassword')->name('updateCurrentPassword');

    Route::POST('updateprofile','Admin\Userscontroller@updateprofile')->name('updateprofile');

    Route::post('import', 'ImportExcelController@import')->name('import');

    Route::get('import', 'ImportExcelController@index');

    Route::resource('expense','ExpensesController');

            Route::post('aprove', 'ExpensesController@aprove')->name('aprove');

            Route::get('action', 'Admin\OrdersController@action')->name('live_search.action');


        });


        //Route::get('deliverer/{id}/products', function () {
        //    return view('admin.Inventory.deliverers.manageprd');
            //});
                    //Route::post('store','Admin\ProductsController@storedvproduct');


//Route::resource('/deliverer','deliverer\DelivererController');

//Route::get('deliverer/profile/{id}', 'deliverer\DelivererController@show')->name('profile');

Route::get('deliverer/inventory', 'deliverer\DelivererController@devproducts');

Route::get('deliverer/orders/{id}', 'deliverer\DelivererController@orders');

Route::post('updateorderstatus', 'Admin\OrdersController@updateorderstatus')->name('updateorderstatus');

Route::post('updateandcheck', 'Admin\OrdersController@updateandcheck')->name('updateandcheck');

Route::post('upred', 'Admin\OrdersController@upred')->name('upred');

Route::post('reset', 'Admin\OrdersController@reset')->name('reset');

Route::get('/Deliverer-Dash', 'HomeController@index');

Route::get('deliverer/profile','deliverer\DelivererController@profile' );

Route::POST('check-current-pwd-dv','deliverer\DelivererController@chkCurrentPassword');

Route::POST('updateCurrentPassword-dv','deliverer\DelivererController@updateCurrentPassword')->name('updateCurrentPassworddv');

Route::POST('updateprofile-dv','deliverer\DelivererController@updateprofile')->name('updateprofiledv');

Route::get('/myexpense', 'ExpensesController@devindex')->name('expense-dev');

Route::get('/create-expense', 'ExpensesController@devcreate');

Route::get('edit-expense/{ex}', 'ExpensesController@devedit');

Route::POST('update/{ex}','ExpensesController@devupdate')->name('updateex');

Route::POST('/store-expense', 'ExpensesController@devstore')->name('storeexpense');

Route::get('/Deliverer-Dash', function () {

    $myorders = DB::table('orders')->where('deliverer_id',Auth::user()->id)->get() ;

    $myexpenses = Expense::where('deliverer_id',Auth::user()->id)->sum('cost') ;

    return view('deliverer.dashboarddv',compact('myorders','myexpenses'));
});





