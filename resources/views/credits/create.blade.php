@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                    <div class="panel-title pull-left">Add Credit</div>
                    <div class="pull-right"><a href="{{ route('credits.index') }}" class="btn btn-sm btn-primary">Back</a></div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('credits.store') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                    <div class="form-group">
                      <label for="">Credit</label>
                      <input type="number" class="form-control" name="credit" id="credit" aria-describedby="helpId" placeholder="Credit">
                     
                    </div>    
                    
                    <div class="form-group">
                        <div class="text-center ">
                            <button type="submit" class="btn btn-success mt-4">Add Credit</button>
                        </div>
                    </div>
                    </form>             
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection