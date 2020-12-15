<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dvs  = DB::table('users')->where('usertype', 'Deliverer')->get();

        $expenses = Expense::all();

        return view('admin.expense.index',compact('dvs','expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dvs  = DB::table('users')->where('usertype', 'Deliverer')->get();
        return view('admin.expense.create',compact('dvs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $expenses = Expense::create([

            'deliverer_id' => $request->input('deliverer_id'),
            'Cost' => $request->input('Cost'),
            'date' => $request->input('date'),
            'Category' => $request->input('Category'),


        ]);

        toast('Expense Aproved !','success');
        return redirect()->route('expense.index');

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
        $dvs  = DB::table('users')->where('usertype', 'Deliverer')->get();
        $expense =Expense::find($id);
        return view('admin.expense.edit',compact('expense','dvs'));
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
        $expense = Expense::query()->find($id);
        $expense->Category = $request->input('Category');
        $expense->Cost = $request->input('Cost');
        $expense->date = $request->input('date');

        $request->validate([
            'Category' => 'required',
            'Cost' => 'required',
            'date' => 'required',
        ]);
        $expense->save();

        toast('Expense Edited !','success');

        return redirect()->route('expense.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return back();
    }
    public function aprove(Request $request){

        if ($request->isMethod('post')  ){

            $data = $request->all();

            Expense::where('id',$data['ex_id'])->update(['status'=>$data['expense_status']]);


        }
        toast('Expense Aproved !','success');
        return back();
    }




    public function devindex()
    {
        $dvs  = DB::table('users')->where('usertype', 'Deliverer')->get();
        $expenses = Expense::where('deliverer_id',Auth::user()->id)->get();
        return view('deliverer.expense',compact('expenses','dvs'));
    }
    public function devcreate()
    {
        return view('deliverer.create');
    }
    public function devstore(Request $request)
    {

        $order = Expense::create([

            'deliverer_id' => Auth::user()->id,
            'Cost' => $request->input('Cost'),
            'date' => $request->input('date'),
            'Category' => $request->input('Category'),


        ]);

        return back();
    }
    public function devedit($id)
    {
        $expense =Expense::find($id);
        return view('deliverer.editexpense',compact('expense'));
    }
    public function devupdate(Request $request, $id)
    {
        $expense = Expense::query()->find($id);
        $expense->Category = $request->input('Category');
        $expense->Cost = $request->input('Cost');
        $expense->date = $request->input('date');

        $request->validate([
            'Category' => 'required',
            'Cost' => 'required',
            'date' => 'required',


        ]);
        $expense->save();

        return redirect()->route('expense-dev');

    }

}
