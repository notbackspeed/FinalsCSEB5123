@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Update Project Stage/Status <strong>{{$project->title}}</strong>
            </div>
            <div class = "card-body">
                <form action = "{{route('project.update', $project->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="pstage">Start Date</label>
                            <!--<input name="pstage" type="text" class="form-control" id="pstage" value="{{$project->pstage}}">-->
                            <select name="pstage" class="form-control" id="pstage" value="{{$project->pstage}}">
                            <option>-- Please Select --</option>
                                <option value="Inception">Inception</option>
	                            <option value="Milestone 1">Milestone 1</option>
                                <option value="Milestone 2 and Final Report">Milestone 2 and Final Report</option>
                                <option value="Closing">Closing</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pstatus">End Date</label>
                            <!--<input name="pstatus" type="text" class="form-control" id="pstatus" value="{{$project->pstatus}}">-->
                            <select name="pstatus" class="form-control" value="{{$project->pstatus}}">
                                <option>-- Please Select --</option>
                                <option value="On Track">On Track</option>
	                            <option value="Delayed">Delayed</option>
                                <option value="Extended">Extended</option>
                                <option value="Completed">Completed</option>
                            </select>
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