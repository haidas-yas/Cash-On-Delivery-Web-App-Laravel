<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Session;
//use App\Http\Requests\importRequest;
use App\Imports\ImportOrders;
class ImportExcelController extends Controller
{

    function index()
    {
        $orders = DB::table('orders')->orderBy('id', 'DESC')->get();
        return view('admin.orders.import_excel', compact('orders'));
    }




    public function import(Request $request)
    {

        $orders = Excel::import(new ImportOrders, request()->file('file'));

        Session::flash('success',' Order Imported !');

        return redirect()->route('orders.index');

    }
}
