@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title pull-left">Add Studies</div>
                    <div class="pull-right"><a href="{{ route('studies.index') }}" class="btn btn-sm btn-primary">Back</a></div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('studies.update', [$studies->id]) }}" method="post">
                        {{ csrf_field() }}
                    @if ($studies->grade == null)
                    <div class="form-group">
                        @if (Auth::user()->role == 'mahasiswa')
                            <label class="form-control-label" or="input-user">Student Name</label>
                            <div class="form-group">
                                <span>{{ Auth::user()->name }}</span>
                                {{-- <input disabled type="number" step=".1" class="form-control" name="grade" id="grade" aria-describedby="helpId"> --}}
                              </div>   
                            @endif
                        </select>
                    </div>    
                    <div class="form-group">
                        <label class="form-control-label" for="input-category">Course Name</label>
                        @if (Auth::user()->role == 'mahasiswa')
                       
                        <select  name="course_id" class="form-control" selected="{{ $studies->course_id }}">
                            @foreach ($course as $c)
                                @if ($c->id == $studies->course_id)
                                <option type="submit" class="dropdown-item" name="course_id" value="{{ $c->id }}">{{ $c->name }}</option>
                                @else
                                <option type="submit" class="dropdown-item" name="course_id" value="{{ $c->id }}">{{ $c->name }}</option>
                                @endif
                            @endforeach
                            </select>
                        @endif
                        
                    </div>  

                    <div class="form-group">
                        <label class="form-control-label"for="input-category">Periode</label>
                        @if (Auth::user()->role == 'mahasiswa')
                        {{-- <input disabled type="number" step=".1" value="{{ $studies->periode->year }}" class="form-control" name="periode" id="periode" aria-describedby="helpId" placeholder="Grade"> --}}
                        <select  name="periode_id" class="form-control" selected="{{ $studies->periode_id }}">
                            @foreach ($periode as $p)
                            @if ($p->id == $studies->periode_id)
                            <option type="submit" class="dropdown-item" name="periode_id" value="{{ $p->id }}">{{ $p->year }}</option>  
                            @else
                            <option type="submit" class="dropdown-item" name="periode_id" value="{{ $p->id }}">{{ $p->year }}</option>
                            @endif
                            @endforeach
                        </select>
                        @endif
                        
                    </div>  
                    <div class="form-group">
                      <label for="">Grade</label>
                      @if (Auth::user()->role == 'dosen')
                      <div class="form-group">
                          <label for="">Grade</label>
                          <input type="number" step=".1" value="{{ $studies->grade }}" class="form-control" name="grade" id="grade" aria-describedby="helpId" placeholder="Grade">
                        </div> 
                        @elseif(Auth::user()->role == 'mahasiswa')
                        <input disabled type="number" step=".1" value="{{ $studies->grade }}" class="form-control" name="grade" id="grade" aria-describedby="helpId" placeholder="Grade">
                      @endif
                    </div>   
                    <div class="form-group">
                        <div class="text-center ">
                            <button type="submit" name="_method" value="PUT" class="btn btn-success mt-4">Edit Studies</button>
                            <button type="submit" name="_method" value="DELETE" class="btn btn-danger mt-4">Delete Studies</button>
                        </div>
                    </div>
                    @else
                    <div class="form-group">
                        @if (Auth::user()->role == 'mahasiswa')
                            <label class="form-control-label" or="input-user">Student Name</label>
                            <div class="form-group">
                                <span>{{ Auth::user()->name }}</span>
                                {{-- <input disabled type="number" step=".1" class="form-control" name="grade" id="grade" aria-describedby="helpId"> --}}
                              </div>   
                            @endif
                        </select>
                    </div>    
                    <div class="form-group">
                        <label class="form-control-label" for="input-category">Course Name</label>
                        @if (Auth::user()->role == 'mahasiswa')
                        <input disabled type="text" step=".1" value="{{ $studies->course->name }}" class="form-control" name="periode" id="periode" aria-describedby="helpId" placeholder="Grade">
                        {{-- <select  name="course_id" class="form-control" selected="{{ $studies->course_id }}">
                            @foreach ($course as $c)
                                @if ($c->id == $studies->course_id)
                                <option type="submit" class="dropdown-item" name="course_id" value="{{ $c->id }}">{{ $c->name }}</option>
                                @else
                                <option type="submit" class="dropdown-item" name="course_id" value="{{ $c->id }}">{{ $c->name }}</option>
                                @endif
                            @endforeach
                            </select> --}}
                        @endif
                        
                    </div>  

                    <div class="form-group">
                        <label class="form-control-label"for="input-category">Periode</label>
                        @if (Auth::user()->role == 'mahasiswa')
                        <input disabled type="number" step=".1" value="{{ $studies->periode->year }}" class="form-control" name="periode" id="periode" aria-describedby="helpId" placeholder="Grade">
                        {{-- <select  name="periode_id" class="form-control" selected="{{ $studies->periode_id }}">
                            @foreach ($periode as $p)
                            @if ($p->id == $studies->periode_id)
                            <option type="submit" class="dropdown-item" name="periode_id" value="{{ $p->id }}">{{ $p->year }}</option>  
                            @else
                            <option type="submit" class="dropdown-item" name="periode_id" value="{{ $p->id }}">{{ $p->year }}</option>
                            @endif
                            @endforeach
                        </select> --}}
                        @endif
                        
                    </div>  
                    <div class="form-group">
                      <label for="">Grade</label>
                      @if (Auth::user()->role == 'dosen')
                      <div class="form-group">
                          <label for="">Grade</label>
                          <input type="number" step=".1" value="{{ $studies->grade }}" class="form-control" name="grade" id="grade" aria-describedby="helpId" placeholder="Grade">
                        </div> 
                        @elseif(Auth::user()->role == 'mahasiswa')
                        <input disabled type="number" step=".1" value="{{ $studies->grade }}" class="form-control" name="grade" id="grade" aria-describedby="helpId" placeholder="Grade">
                      @endif
                    </div>   
                    <div class="form-group">
                        <div class="text-center ">
                            @if (Auth::user()->role == 'dosen')
                            <button type="submit" name="_method" value="PUT" class="btn btn-success mt-4">Edit Studies</button>
                            @endif
                            <button type="submit" name="_method" value="DELETE" class="btn btn-danger mt-4">Delete Studies</button>
                        </div>
                    </div>
                    @endif
                    </form>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection