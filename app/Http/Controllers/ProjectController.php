<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * {{ route('car.show',$project->id)}}
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('user')->get();
        $users = User::all();
        //return $projects;
        return view('prog.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('admin-only', auth()->user())){
            $users = User::all();
            return view('prog.create', compact('users'));
        }
        else{
            return view('errors.403');
        }

        //return view('prog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'user_id'=> 'required',
            'start'=> 'required',
            'end'=> 'required',
            'duration'=> 'required',
            'cost'=> 'required',
            'client'=> 'required',
            'pstage' =>'required',
            'pstatus' =>'required'
        ]);

        Project::create($request->all());

        return redirect()->route('project.index')->with('success','New Project has been Made.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('prog.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {   
        if(Gate::allows('admin-only', auth()->user())){
            $users = User::all();
            $projLead = User::find($project->id);
            return view('prog.update', compact('project', 'projLead', 'users'));
        }
        if(Gate::allows('leader-only', auth()->user())){
            $users = User::all();
            $projLead = User::find($project->id);
            return view('prog.edit', compact('project', 'projLead', 'users'));
        }
        else{
            return view('errors.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     *  
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Project $project)
    {
        $request->validate(['start', 'end', 'duration', 'cost', 'client', 'pstage', 'pstatus']);

        $project->update($request->all());

        return redirect()->route('project.index')->with('success', 'Project information updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     
    public function destroy(Project $project)
    {
        if(Gate::allows('admin-only', auth()->user())){
            $car->delete();
            return redirect()->route('car.index')->with('success','Car had been deleted!');
        }
        else{
            return view('errors.403');
        }
    }*/
}

/**public function updateP(Request $request, Project $project)
{
    $request->validate([
        'pstage' => 'required',
        'pstatus' => 'required',
    ]);

    $project->update($request->all());

    return redirect()->route('project.index')->with('success', 'Project information updated.');
}

public function editP(Project $project)
{
    //if(Gate::allows('leader-only', auth()->user())){
        $users = User::all();
        $projLead = User::find($project->id);
        return view('prog.stagestat', compact('project', 'projLead', 'users'));
    //}
    //else{
        //return view('errors.403');
    //}
}*/

