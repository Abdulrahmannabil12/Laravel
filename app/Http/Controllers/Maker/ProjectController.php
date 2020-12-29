<?php

namespace App\Http\Controllers\Maker;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\ProjectTasks;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $projects =  Project::all();


       return view('maker.project.show' ,compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maker.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectRequest $request)
    {
        try {

            auth()->user()->projects()->create([
                'title'=>$request->name,
                'status'=>$request->status,
            ]);
            return redirect()->route('project.index')->with(['success'=>'project created']);
        }
     catch ( \Exception $e){
            return redirect()->route('project.index')->with(['error'=>'somthing wrong happen']);
     }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $project = Project::findOrfail($id);
        return view('maker.project.edit' ,compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        try {
            $project = Project::find($id);
            if (!$project){
                return redirect()->route('project.index')->with(['error'=>'Project Not Found']);
            }
            auth()->user()->projects()->where('id',$id)->update([
                'title'=>$request->name,
                'status'=>$request->status,
            ]);
            return redirect()->route('project.index')->with(['success'=>'project Updated']);
        }
        catch ( \Exception $e){
            return redirect()->route('project.index')->with(['error'=>'somthing wrong happend']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $project = Project::find($id);
            if (!$project){
                return redirect()->route('project.index')->with(['error'=>'Project Not Found']);
            }
            $project->delete();

            return redirect()->route('project.index')->with(['success'=>'project Deleted']);
        }
        catch ( \Exception $e){
            return redirect()->route('project.index')->with(['error'=>'somthing wrong happend']);
        }
    }
}
