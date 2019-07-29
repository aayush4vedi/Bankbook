<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('index');
        $bank = Bank::all();
        $bankDistinct = DB::table('banks')->distinct()->get('bank_name');
        return view('banks.index', compact('bank', 'bankDistinct'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');
    }
    //TODO: (1)ad query by branch name
    //TODO: (2) collect bank name from $request
    public function search(Request $request){
        if(!$request['ifsc']==""){
            request()->validate([
                'ifsc'=>['required','min:2']
            ]);
            $bank = DB::table('banks')->where('ifsc', 'like', '%'. $request['ifsc'].'%')->get();
            $bankDistinct = DB::table('banks')->distinct()->get('bank_name');
            return view('banks.index', compact('bank', 'bankDistinct'));
        }else if(!$request['bank_name']=="" && !$request['branch_name']==""){
            request()->validate([
                'bank_name'=>['required','min:2'],
                'branch_name'=>['required','min:2']
                ]);
                
            $bank = DB::table('banks')->where('bank_name', 'like', '%'. $request['bank_name']. '%')->where('branch_name', 'like', '%'. $request['branch_name'].'%')->get();
            $bankDistinct = DB::table('banks')->distinct()->get('bank_name');
            return view('banks.index', compact('bank', 'bankDistinct'));
        }else{
            dd('else');
        }

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
            'ifsc' => ['required', 'min:6'],
            'bank_name' => ['required', 'min:3'],
            'branch_name' => ['required', 'min:5'],
            'address' => ['required', 'min:5'],
            'contact_number' => ['required', 'min:5'],
            'email' => ['required', 'min:5'],
            'manager' => ['required', 'min:5']
        ]);
        $bank = new Bank([
            'ifsc' => $request->get('ifsc'),
            'bank_name' => $request->get('bank_name'),
            'branch_name' => $request->get('branch_name'),
            'address' => $request->get('address'),
            'contact_number' => $request->get('contact_number'),
            'email' => $request->get('email'),
            'manager' => $request->get('manager')
        ]);
        $bank->save();
        return redirect('/banks')->with('success', 'Bank Registered!');
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
        $bank = Bank::find($id);
        return view('banks.edit', compact('bank'));
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
        $request->validate([
            'ifsc' => ['required', 'min:6'],
            'bank_name' => ['required', 'min:3'],
            'branch_name' => ['required', 'min:5'],
            'address' => ['required', 'min:5'],
            'contact_number' => ['required', 'min:5'],
            'email' => ['required', 'min:5'],
            'manager' => ['required', 'min:5']
        ]);
        $bank = Bank::find($id);
        $bank->ifsc = $request->get('ifsc');
        $bank->bank_name = $request->get('bank_name');
        $bank->branch_name = $request->get('branch_name');
        $bank->address = $request->get('address');
        $bank->contact_number = $request->get('contact_number');
        $bank->email = $request->get('email');
        $bank->manager = $request->get('manager');

        $bank->save();
        return redirect('/banks')->with('success', 'Bank Updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        return redirect('/banks')->with('success', 'Bank Deleted!');
    }
}
