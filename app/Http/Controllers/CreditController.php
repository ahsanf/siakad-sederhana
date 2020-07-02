<?php

namespace App\Http\Controllers;

use App\Credits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credit = Credits::all();
        return view('credits.index', compact('credit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $credit = Credits::all();
        return view ('credits.create',compact('credit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          
            'credit'=> 'required'
        ]);
 //
       Credits::create([
           'credit'=>$request->credit,
           'user_id' => Auth::user()->id
       ]);
        return redirect()->route('credits.index');
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
        //
        $credit = Credits::findOrFail($id);
        return view('credits.edit', compact('credit'));
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
        $this->validate($request,[
            'credit' => 'required'
        ]);

        $credit = Credits::findOrFail($id);
        $credit->credit = $request->credit;
        $credit->save();

        return redirect()->route('credits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credit = Credits::findOrFail($id);
        $credit->delete();
        return redirect()->route('credits.index');
    }
}
