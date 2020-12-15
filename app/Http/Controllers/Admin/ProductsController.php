<?php

namespace App\Http\Controllers\Admin;

use App\Dvproduct;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use App\Http\Requests\prdRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        return view('admin.products.index')->with('products',$products);
    }

//    public function show2($id)
//    {
//
//       DB::table('dvproducts')->get();
//
//      return view('admin.inventory.deliverers.manageprd',compact('products','dv','dvproducts'));
//
//    }


    public function showdvprd($id)
    {

        $products= Product::all();
        $dv  = DB::table('users')->where('usertype', 'Deliverer')->find($id);
        $dvproducts = Dvproduct::where('deliverer_id',$dv->id)->get();


        return view('admin.inventory.deliverers.manageprd',compact('products','dv','dvproducts'));
    }

    public function storedvproduct(Request $request)
    {

        $dvproduct = new Dvproduct();
        $dvproduct->deliverer_id = $request->input('deliverer_id')  ;
        $dvproduct->product_id = $request->input('product_id') ;
        $dvproduct->quantity = $request->input('quantity');

        if (Dvproduct::where('deliverer_id',$request->input('deliverer_id') )->where('product_id', $request->input('product_id'))->exists()){

               /**  get current quantity offf                 **/
               $current = DB::table('dvproducts')->select('quantity')
                   ->where('deliverer_id', '=',  $dvproduct->deliverer_id)
                   ->where('product_id','=' ,$dvproduct->product_id)
                   ->value('quantity');

               /**  update it                 **/

               Dvproduct::where('deliverer_id', $request->input('deliverer_id')  )->where('product_id', $request->input('product_id'))->update(['quantity' => $request->input('quantity')+$current ]);

           }else{

               $dvproduct->save();

           }


        toast('Deliverer Has Deleted !','success');


        return back();

    }

    public function reduceqtty(Request $request){

        if ($request->isMethod('post')){

            $data = $request->input('quantity');

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $product = Product::create($request->all());
        $product->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit',[
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::query()->find($id);
        $product->name = $request->input('name');
        $product->costperone = $request->input('costperone');
        $product->desc = $request->input('desc');

        $request->validate([
            'name' => 'required',
            'costperone' => 'required',
            'desc' => 'required',
        ]);
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

       $dvproduct = Dvproduct::where('product_id',$id)->delete();


        return back();
    }
}
