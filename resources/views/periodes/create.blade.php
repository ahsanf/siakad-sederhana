@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title pull-left">Add Periode</div>
                    <div class="pull-right"><a href="{{ route('periodes.index') }}" class="btn btn-sm btn-primary">Back</a></div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('periodes.store') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                    <div class="form-group">
                      <label for="">Year</label>
                      <input type="number" class="form-control" name="year" id="Year" aria-describedby="helpId" placeholder=" Year">
                     
                    </div>    
                    <div class="form-group">
                      <label for="">Semester</label>
                      <input type="number" class="form-control" name="semester" id="semester" aria-describedby="helpId" placeholder="Semester">
                     
                    </div>  
                  
                    <div class="form-group"> 
                        <label class="control-label" for="date">Register Start</label>
                        <input class="form-control" name="register_start" type="date"/>
                      </div>
                    <div class="form-group"> 
                        <label class="control-label" for="date">Register End</label>
                        <input class="form-control"  name="register_end" placeholder="MM/DD/YYY" type="date"/>
                      </div>
                    
                    <div class="form-group">
                        <div class="text-center ">
                            <button type="submit" class="btn btn-success mt-4">Add Periode</button>
                        </div>
                    </div>
                    </form>             
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection