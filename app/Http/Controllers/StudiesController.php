<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Periodes;
use App\Studies;
use App\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //

        $user = User::findOrfail($id);
        $studies = Studies::all();
        $periode = Periodes::all();
        $couurse = Courses::all();
        return view('studies.index',compact('studies','periode', 'course','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::findOrFail($id);
        $studies = Studies::all();
        $periode = Periodes::all();
        $course = Courses::all();

        return view('studies.create', compact('user', 'studies', 'periode', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'periode_id' => 'required',

        ]);

        $user_id = User::findOrFail($id);
        Studies::create([
            'user_id' => $user_id,
            'course_id' => $request->course_id,
            'periode_id' =>$request->periode_id
        ]);
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
    public function edit($id, $user_id)
    {
        $studies = Studies::findOrFail($id);
        $user = User::findOrFail($user_id);
        $periode = Periodes::all();
        $course = Courses::all();
        return view('studies.edit', compact('user', 'studies', 'periode', 'course'));
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
      
        $studies = Studies::findOrFail($id);
        $studies->course_id = $request->course_id;
        $studies->periode_id = $request->periode_id;
        $studies->course_id = $request->course_id;
        $studies->save();
        return redirect()->route('studies.index', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studies = Studies::findOrFail($id);
        $studies->delete();
        return redirect()->route('studies.index');;
    }
}
