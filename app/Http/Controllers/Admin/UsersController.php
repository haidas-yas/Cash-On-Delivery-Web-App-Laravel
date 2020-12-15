<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use DemeterChain\A;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
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
    public static function deliverers(){

        $dv  = DB::table('users')->where('usertype', 'Deliverer')->get();

        return view('admin.Inventory.deliverers.index')->with('dvs',$dv);
    }
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
            $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'usertype' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['name', 'email', 'password','phone','city','gender','usertype']));
        return redirect()->route('users.index');

    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function profile(){

        $teams = User::where('usertype','Deliverer')->get();
        $admindetails = DB::table('users')->where('id',Auth::user()->id)->first();
        $orders = DB::table('orders')->where('responsible_id',Auth::user()->id)->get();
        return view('admin.users.userprofile')->with(compact('admindetails','orders','teams'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $orders = Order::find($id);
        $user=User::find($id);
        return view('admin.users.userprofile')->with('user',$user,'orders',$orders);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', [
            'user' => $user
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
        $user = User::query()->find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->gender = $request->input('gender');
        $user->usertype = $request->input('usertype');
        $user->password = $request->input('password');

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'usertype' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user->save();
        Alert::info('Done! ', 'User Has updated !');
        return redirect()->route('users.index', ['user' => $user->id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::info('Done! ', 'user Has Deleted !');
        return redirect()->route('users.index');
    }
    public function adddv(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'usertype' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user = User::create($request->all());
        $user->save();
        return back();
    }
    public function dltdv($id)
    {
        $user = User::find($id);
        $user->delete();
        toast('Deliverer Has Deleted !','success');
        return back();
    }


}
