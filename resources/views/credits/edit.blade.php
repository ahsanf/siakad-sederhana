@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title pull-left">Edit Credit</div>
                    <div class="pull-right"><a href="{{ route('credits.index') }}" class="btn btn-sm btn-primary">Back</a></div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('credits.update', [$credit->id]) }}" method="post">
                        {{ csrf_field() }}
                        
                    <div class="form-group">
                      <label for="">Credit</label>
                      <input type="number" class="form-control" name="credit" id="credit" aria-describedby="helpId" placeholder="Credit" value="{{ $credit->credit }}">
                     
                    </div>    
                    
                    <div class="form-group">
                        <div class="text-center ">
                            <button type="submit"  name="_method" value="PUT" class="btn btn-success mt-4">Edit Credit</button>
                            <button type="submit" name="_method" value="DELETE" class="btn btn-danger mt-4">Delete Credit</button>
                        </div>
                    </div>
                    </form>             
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection