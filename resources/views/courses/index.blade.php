@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title pull-left">Courses</div>
                    @if (Auth::user()->role == 'admin')
                    <div class="pull-right"><a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">Add Courses</a></div>
                    @elseif(Auth::user()->role == 'dosen')
                    <div class="pull-right"><a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">Add Courses</a></div>
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
                                <th scope="col">Course name</th>
                                <th scope="col">Credit</th>
                                @if (Auth::user()->role == 'admin')
                                <th scope="col">Action</th>
                                @elseif (Auth::user()->role == 'dosen')
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($course as $c )
                            <tr>
                                <td><?php echo $i++?></td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->credit }}</td>
                                <td>
                                    @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('courses.edit', $c->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @elseif(Auth::user()->role == 'dosen')
                                    <a href="{{ route('courses.edit', $c->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @endif
                                </td>
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