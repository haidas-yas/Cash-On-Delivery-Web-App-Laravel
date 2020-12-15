<?php

namespace App\Http\Controllers\deliverer;

use App\Dvproduct;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;
class DelivererController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('deliverer.dashboarddv');

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//
////        $userhash->hashids->encode($id);
//        $user=User::find($id);
//
//        return view('deliverer.profile')->with('user',$user);
//    }
    public function devproducts()
    {

        $products= Product::all();

        $dvproducts = Dvproduct::where('deliverer_id',Auth::user()->id)->get();

        return view('deliverer.devproducts',compact('products','dvproducts'));
    }
    public function orders()
    {
        $orders = Order::all()->where('deliverer_id',Auth::user()->id);
        $products = Product::all();
//        $product  = DB::table('products')->where('usertype', 'Deliverer')->get();

        return view('deliverer.orders',compact('orders','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updatev(Request $request, Ville $ville)
    {
        $image = $request->hidden_image;
        $image = $request->file('image');
        $destinationPath = public_path('uploads');
        $ville->name = $request->input('name');
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:1000'
        ]);
        $ville->update($request->except(['image']));
        $ville->save();
        return redirect('/avilles')->with('status','Data updated foe villes');
    }
    public function profile(){


        $orders = DB::table('orders')->where('deliverer_id',Auth::user()->id)->get();
        return view('deliverer.profile')->with(compact('orders'));
    }



    public function chkCurrentPassword(Request $request){
        $data = $request->all();
        if (Hash::check($data['current_password'],Auth::user()->password)){
            echo "true";

        }else{
            echo 'false';
        }
    }

    public function updateCurrentPassword(Request $request){

        if ($request->isMethod('post')){
            $data = $request->all();
//            if current pass corresct
            if (Hash::check($data['current_password'],Auth::user()->password)){
//                if new == confirm password
                if ($data['new_password']==$data['confirm_password']){
//                    update pass
                    User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    Session::flash('success','Passwords Changed succesfly  !');

                }else{
                    Session::flash('error','Passwords do not match !');
                }
            }else{
                Session::flash('error','Current Password is incorrect !');
            }
            return back();
        }
    }

    public function updateprofile(Request $request){

        if ($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'phone' => 'required|numeric',
                'city' => 'required|min:5 ',
                'gender' => 'required',
            ];

            DB::table('users')->where('id',Auth::user()->id)->update(['name'=>$data['name'],'phone'=>$data['phone'],'city'=>$data['city'],'gender'=>$data['gender']]);


            Session::flash('success',' Profile Changed Succesfly !');
            $this->validate($request,$rules);
            return back();
        }

    }
}
