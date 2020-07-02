<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Periodes;
use App\Studies;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'dosen') {
            $studies = Studies::all();
        } else if (Auth::user()->role == 'mahasiswa'){
            $studies = Studies::where('user_id' ,'=', Auth::user()->id)->get();
        } else {
            $studies = Studies::all();
        }
       
        $course = Courses::all();
        $periode = Periodes::all();
    
        return view('studies.index', compact('studies','course','periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'periode_id' => 'required',
        ]);

        if (Auth::user()->role == 'dosen') {
            Studies::create([
                'user_id' => $request->user_id,
                'course_id' => $request->course_id,
                'periode_id' => $request->periode_id,
                'grade' => $request->grade
            ]);
        } else {
            Studies::create([
                'user_id' => Auth::user()->id,
                'course_id' => $request->course_id,
                'periode_id' => $request->periode_id
            ]);
        }
        
        return redirect()->route('studies.index');
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
        $studies = Studies::findOrFail($id);
        $user = User::all();
        $periode = Periodes::all();
        $course = Courses::all();
        return view('studies.edit', compact('studies', 'user','periode', 'course'));
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
        $studies->grade = $request->grade;
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
        return redirect()->route('studies.index');
    }
}
