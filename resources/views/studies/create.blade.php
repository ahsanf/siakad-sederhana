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
                    <form action="{{ route('studies.store') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                    <div class="form-group">
                            @if (Auth::user()->role == 'mahasiswa')
                            <label class="form-control-label" or="input-user">Student Name</label>
                            <div class="form-group">
                                <span>{{ Auth::user()->name }}</span>
                                {{-- <input disabled type="number" step=".1" class="form-control" name="grade" id="grade" aria-describedby="helpId"> --}}
                              </div>   
                            @endif
                        {{-- <select name="user_id" class="form-control">
                            @foreach ($user as $u)
                            <option type="submit" class="dropdown-item" name="user_id" value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select> --}}
                    </div>    
                    <div class="form-group">
                        <label class="form-control-label"
                            for="input-category">Choose Course</label>
                        <select name="course_id" class="form-control">
                            @foreach ($course as $c)
                            <option type="submit" class="dropdown-item" name="course_id" value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>  

                    <div class="form-group">
                        <label class="form-control-label"
                            for="input-category">Choose Periode</label>
                        <select name="periode_id" class="form-control">
                            @foreach ($periode as $p)
                            <option type="submit" class="dropdown-item" name="periode_id" value="{{ $p->id }}">{{ $p->year }}</option>
                            @endforeach
                        </select>
                    </div>  
                    @if (Auth::user()->role == 'dosen')
                    <div class="form-group">
                        <label for="">Grade</label>
                        <input type="number" step=".1" class="form-control" name="grade" id="grade" aria-describedby="helpId" placeholder="Grade">
                      </div> 
                    @endif
                    <div class="form-group">
                        <div class="text-center ">
                            <button type="submit" class="btn btn-success mt-4">Add Studies</button>
                        </div>
                    </div>
                    </form>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection