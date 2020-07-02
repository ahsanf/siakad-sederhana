<?php

namespace App\Http\Controllers;

use App\Periodes;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $periode = Periodes::all();
        return view('periodes.index', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $periode = Periodes::all();
        return view('periodes.create', compact('periode'));
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
        $this->validate($request, [
            'year' => 'required',
            'semester' => 'required',
            'register_start' => 'required',
            'register_end' => 'required'
         ]);

         Periodes::create([
             'year' => $request->year,
             'semester' => $request->semester,
             'register_start' => $request->register_start,
             'register_end' => $request->register_end
         ]);
         return redirect()->route('periodes.index');   
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
        $periode = Periodes::findOrFail($id);
        return view('periodes.edit', compact('periode'));
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
        $periode = Periodes::findOrFail($id);
        $periode->year = $request->year;
        $periode->semester = $request->semester;
        $periode->register_start = $request->register_start;
        $periode->register_end = $request->register_end;
        $periode->save();
        return redirect()->route('periodes.index');

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
        $periode = Periodes::findOrFail($id);
        $periode->delete();
        return redirect()->route('periodes.index');
    }
}
