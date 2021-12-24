@extends('layouts.app')
@section('content')
    
    @if($message = Session::get('success'))
        <div class= "alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                List of Projects
            </div>
            <div class="card-body">
                <div class="text-right">
                    <a class="btn btn-primary mb-3" href="{{route('project.create')}}">Create New Project</a>
                </div>
                <table class="table table-responsive table-bordered">
                    <thread>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration</th>
                            <th>Cost</th>
                            <th>Client</th>
                            <th>Stage</th>
                            <th>Status</th>
                            <th>Project Leader</th>
                        </tr>
                    </thread>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$project->title}}</td>
                            <td>{{$project->start}}</td>
                            <td>{{$project->end}}</td>
                            <td>{{$project->duration}}</td>
                            <td>{{$project->cost}}</td>
                            <td>{{$project->client}}</td>
                            <td>{{$project->pstage}}</td>
                            <td>{{$project->pstatus}}</td>
                            <td>{{$project->user_id}}</td>
                            <td>
                                <a class="btn btn-primary" href="">Show Members</a>
                                <a class="btn btn-warning" href="{{ route('project.edit',$project->id)}}">Edit Project</a>
                                <a class="btn btn-secondary" href="{{ route('project.edit',$project->id)}}">Update Project Stage/Status</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
