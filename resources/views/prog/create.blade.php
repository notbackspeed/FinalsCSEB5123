@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach 
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Create a new Project
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('project.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="user_id">Project Leader</label>
                            <select name="user_id" class="form-control" id="user_id" value="{{old('user_id')}}">>
                                <option>-- Please Select --</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="start">start</label>
                            <input name="start" type="text" class="form-control" id="start" value="{{old('start')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="end">End</label>
                            <input name="end" type="text" class="form-control" id="end" value="{{old('end')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="duration">Duration</label>
                            <input name="duration" type="text" class="form-control" id="duration" value="{{old('duration')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cost">Cost</label>
                            <input name="cost" type="text" class="form-control" id="cost" value="{{old('cost')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="client">Client</label>
                            <input name="client" type="text" class="form-control" id="client" value="{{old('client')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="pstage">Project Stage</label>
                            <!--<input name="pstage" type="text" class="form-control" id="pstage" value="{{old('pstage')}}">-->
                            <select name="pstage" class="form-control">
                                <option>-- Please Select --</option>
                                <option value="Inception">Inception</option>
	                            <option value="Milestone 1">Milestone 1</option>
                                <option value="Milestone 2 and Final Report">Milestone 2 and Final Report</option>
                                <option value="Closing">Closing</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pstatus">Project Status</label>
                            <!--<input name="pstatus" type="text" class="form-control" id="pstatus" value="{{old('pstatus')}}">-->
                            <select name="pstatus" class="form-control">
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