@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Update Project Information <strong>{{$project->title}}</strong>
            </div>
            <div class = "card-body">
                <form action = "{{route('project.update', $project->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="start">Start Date</label>
                            <input name="start" type="text" class="form-control" id="start" value="{{$project->start}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end">End Date</label>
                            <input name="end" type="text" class="form-control" id="end" value="{{$project->end}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="duration">Duration</label>
                            <input name="duration" type="text" class="form-control" id="duration" value="{{$project->duration}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cost">Cost</label>
                            <input name="cost" type="text" class="form-control" id="cost" value="{{$project->cost}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="client">Client</label>
                            <input name="client" type="text" class="form-control" id="client" value="{{$project->client}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 text-center mt-4">
                            <input type="submit" class="btn btn-primary">&nbsp;
                            <input type="reset" class="btn btn-warning">&nbsp;
                            <a class="btn btn-success" href="{{route('project.index')}}">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection