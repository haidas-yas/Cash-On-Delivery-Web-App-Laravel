<?php

namespace App\Http\Controllers\Admin;

use App\Dvproduct;
use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Notifications\NewOrder;
use App\Order;
use App\Product;
use App\User;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        $products = Product::all();
        $respos = User::all();
//        $product  = DB::table('products')->where('usertype', 'Deliverer')->get();

        return view('admin.orders.index',compact('orders','products','respos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order;
        $dvs  = DB::table('users')->where('usertype', 'Deliverer')->get();
        $products = Product::all();
        return view('admin.orders.create',compact("order" ,"dvs","products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
//        $request->validate([
//
//                'deliverer_id'=> 'required',
//                'product_id'=> 'required',
//                'quantity'=> 'required',
//                'totalprice'=> 'required',
//                'client_name'=> 'required',
//                'client_phone'=> 'required',
//                'client_city'=> 'required',
//                'client_addrs'=> 'required',
//                'note'=> 'required',
//        ]);

        $order = Order::create([

        'deliverer_id' => $request->input('deliverer_id'),
        'product_id' => $request->input('product_id'),
        'responsible_id'=>$request->input('responsible_id'),
        'quantity'=> $request->input('quantity'),
        'totalprice' => $request->input('totalprice'),
        'client_name' => $request->input('client_name'),
        'client_phone' => $request->input('client_phone'),
        'client_city'=> $request->input('client_city'),
        'client_addrs'=> $request->input('client_addrs'),
        'note'=> $request->input('note'),

        ]);

//        $email = User::select('email')->where('id',$request->input('deliverer_id'))->get();
//
//        \Mail::send('admin.orders.order_email',
//            array(
//
//            ), function($message)use ($email)
//            {
//                $message->from('haidas015@gmail.com');
//                $message->to($email);
//            });

        return redirect()->route('orders.index');
    }
    function action(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $orders = DB::table('orders')
                ->where('id', 'like', '%'.$request->search.'%')
                ->orWhere('status', 'like', '%'.$request->search.'%')
                ->orWhere('client_name', 'like', '%'.$request->search.'%')
                ->orWhere('client_phone', 'like', '%'.$request->search.'%')
                ->orWhere('client_city', 'like', '%'.$request->search.'%')
                ->orWhere('client_addrs', 'like', '%'.$request->search.'%')
                ->orWhere('product_id', 'like', '%'.$request->search.'%')
                ->orWhere('totalprice', 'like', '%'.$request->search.'%')
                ->orWhere('quantity', 'like', '%'.$request->search.'%')
                ->orderBy('id', 'desc')
                ->get();
            if($orders)
            {
                foreach ($orders as $key => $order) {
                    $output.='<tr>
         <td>'.$order->id.'</td>

         <td>'.$order->order_status.'</td>
         <td>'.$order->client_name	.'</td>
         <td>'.$order->client_phone	.'</td>
         <td>'.$order->client_city		.'</td>
         <td>'.$order->quantity		.'</td>

        </tr>';
                }
                return Response($output);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dvs  = DB::table('users')->where('usertype', 'Deliverer')->get();
        $products = Product::all();
        $order = Order::find($id);
        return view('admin.orders.edit',compact("order" ,"dvs","products"));


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
        $order = Order::query()->find($id);
//        $olddeliverer

        $order->deliverer_id = $request->input('deliverer_id');
        $order->product_id = $request->input('product_id');
        $order->quantity= $request->input('quantity');
        $order->totalprice = $request->input('totalprice');
        $order->client_name = $request->input('client_name');
        $order->client_phone = $request->input('client_phone');
        $order->client_city= $request->input('client_city');
        $order->client_addrs= $request->input('client_addrs');
        $order->note= $request->input('note');

//        $request->validate([
//            'deliverer_id'=> 'required',
//            'product_id'=> 'required',
//            'responsible_id'    =>'required' ,
//            'quantity'=> 'required',
//            'totalprice'=> 'required',
//            'client_name'=> 'required',
//            'client_phone'=> 'required',
//            'client_city'=> 'required',
//            'client_addrs'=> 'required',
//            'note'=> 'required',
//        ]);
        $order->save();
        return redirect()->route('orders.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back();
    }
    public function updateorderstatus(Request $request)

        {
        if ($request->isMethod('post')  ){

                $data = $request->all();

                Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);


            }
                return back();
            }

    public function upred(Request $request){

        if ($request->isMethod('post')  ){

            $data = $request->all();

            $current = Dvproduct::where('product_id',$data['product_id'])->sum('quantity');


            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);

            Dvproduct::where('product_id',$data['product_id'])->update( ['quantity'=>   $current  -$data['quantity']] );

            Session::flash('success','Great job! Order has been successfully delivered !');

            return back();


        }

    }

    public function updateandcheck(Request $request){

        if ($request->isMethod('post') ){

            $data = $request->all();
            if (   Dvproduct::where('product_id',$data['product_id'])->exists() ){

                $current = Dvproduct::where('product_id',$data['product_id'])->sum('quantity');

                if ($data['quantity']  > $current ){


                    Session::flash('warning','The quantity required is not available in stock !');

                    return back();

                }else

                    Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);

                Session::flash('success','Great job! Order On The Way !');

                return back();
            }else

                Session::flash('warning','Deliverer dont have any of this product !');

                return back();


        }








    }
    public function reset(Request $request){

        if ($request->isMethod('post')  ){

            $data = $request->all();

            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);

            $current = Dvproduct::where('product_id',$data['product_id'])->sum('quantity');

            Dvproduct::where('product_id',$data['product_id'])->update( ['quantity'=>   $current + $data['quantity']] );


        }
        return back();
    }



}
