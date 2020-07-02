@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title pull-left">Credits</div>
                    @if (Auth::user()->role == 'admin')
                    <div class="pull-right"><a href="{{ route('credits.create') }}" class="btn btn-sm btn-primary">Add Credit</a></div>
                    @endif
                    
                    <div class="clearfix"></div>
                </div>
               
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Credit</th>
                                @if (Auth::user()->role == 'admin')
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($credit as $c )
                            <tr>
                                <td><?php echo $i++?></td>
                                <td>{{ $c->credit }}</td>
                                @if (Auth::user()->role == 'admin')
                                <td>
                                    <a href="{{ route('credits.edit', $c->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection