<?php

namespace App\Http\Controllers\maker;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\ProjectTasks;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project = Project::findOrfail($id);
        return view('maker.project-task.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        try {


            $prject = Project::findOrfail($request->project_id);
            if (!$prject) {
                return redirect()->route('project.index')->with(['error' => 'something wrong happen']);
            }
            $prject->tasks()->create([
                'title' => $request->title,
                'status' => $request->status,
                'content' => $request->details,
                'project_id' => $request->project_id,
            ]);


            return redirect()->route('project.index')->with(['success' => 'New Task Been Add ']);
        } catch (\Exception $e) {
            return redirect()->route('project.index')->with(['error' => 'something wrong happen']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tasks = ProjectTasks::with(['projects' => function ($q) {
                $q->selection();
            }])->where('project_id',$id)->get();


            return view('maker.project-task.show', compact('tasks'));
        } catch (\Exception $e) {
            return redirect()->route('project.index')->with(['error' => 'somthing wrong happen']);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = ProjectTasks::with(['projects' => function ($q) {
            $q->selection();
        }])->findOrFail($id);
        return view('maker.project-task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        try {

            $prject = Project::findOrfail($request->project_id);
            if (!$prject) {
                return redirect()->route('task.show', $request->project_id)->with(['error' => 'task not found']);
            }
            $prject->tasks()->where('id', $id)->update([
                'title' => $request->title,
                'status' => $request->status,
                'content' => $request->details,

            ]);
            return redirect()->route('task.show', $request->project_id)->with(['success' => 'Task been updated ']);
        } catch (\Exception $e) {
            return redirect()->route('task.show', $request->project_id)->with(['error' => 'something wrong happen']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        try {

            $task = ProjectTasks::findOrfail($id);
            if (!$task){
                return redirect()->back()->with(['error' => 'task not found']);
            }
            $task->delete();
            return redirect()->back()->with(['success' => 'Task been Deleted ']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'something wrong happen']);
        }

    }
}
