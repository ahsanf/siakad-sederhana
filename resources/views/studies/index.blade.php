@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title pull-left">{{Auth::user()->name }} Studies</div>
                    <div class="pull-right"><a href="{{ route('studies.create') }}" class="btn btn-sm btn-primary">Add Studies</a></div>
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
                                <th scope="col">Student name</th>
                                <th scope="col">Course name</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Grade</th>
                                
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($studies as $s )
                            <tr>
                                <td><?php echo $i++?></td>
                                <td>{{ $s->user->name }}</td>
                                <td>{{ $s->course->name}}</td>
                                <td>{{ $s->periode->year }}</td>
                                @if ($s->grade == null)
                                <td>Not Graded</td>
                                @else
                                <td>{{ $s->grade }}</td>
                                @endif
                                @if (Auth::user()->role == 'mahasiswa')
                                <td>
                                    <a href="{{ route('studies.edit', $s->id) }}" class="btn btn-sm btn-primary">More</a>
                                </td>
                                @elseif(Auth::user()->role == 'dosen')
                                <td>
                                    <a href="{{ route('studies.edit', $s->id) }}" class="btn btn-sm btn-primary">Edit</a>
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