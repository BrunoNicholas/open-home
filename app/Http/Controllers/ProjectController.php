<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Department;
use Illuminate\Http\Request;
use Image;

class ProjectController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:super-admin|admin|patron|chaiperson|cu-leader|editor')->except('index','show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate();
        return view('system.projects.index', compact(['projects']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects   = Project::latest()->paginate();
        $departments= Department::all();
        return view('system.projects.create',compact(['projects','departments']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
        'name'          => 'required|unique:projects',
        'created_by'    => 'required',
        'start_date'    => 'required',
        'status'        => 'required',
        ]);
        Project::create($request->all());

        if ($request->hasFile('description_image')) {
            $project_image = $request->file('description_image');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();

            Image::make($project_image)->resize(340, 340)->save( public_path('/files/projects/images/' . $filename) );
            
            $project = Project::where('name',$request->name)->get()->first();
            $project->description_image = $filename;
            $project->save();

        }

        return redirect()->route('projects.index')->with('success','Project added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->route('projects.index')->with('danger', 'Project Not Found!');
        }
        return view('system.projects.show', compact('project'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $projects   = Project::latest()->paginate();
        $departments= Department::all();
        if (!$project) {
            return redirect()->route('projects.index')->with('danger', 'Project Not Found!');
        }
        return view('system.projects.edit', compact(['project','projects','departments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name'          => 'required',
            'created_by'    => 'required',
            'start_date'    => 'required',
            'status'        => 'required',
        ]);

        $project = Project::find($id);

        $project->created_by    = $request->created_by;
        $project->department    = $request->department;
        $project->name          = $request->name;
        $project->description   = $request->description;
        $project->estimated_period  = $request->estimated_period;
        $project->start_date    = $request->start_date;
        $project->end_date      = $request->end_date;
        $project->status        = $request->status;
        $project->save();

        if ($request->hasFile('description_image')) {
            $project_image = $request->file('description_image');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();

            Image::make($project_image)->resize(340, 340)->save( public_path('/files/projects/images/' . $filename) );
            
            $project = Project::where('name',$request->name)->get()->first();
            $project->description_image = $filename;
            $project->save();

        }

        return redirect()->route('projects.index')->with('success','Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Project::find($id);
        $item->delete();

        return redirect()->route('projects.index')->with('danger', 'Project Deleted Successfully');
    }
}
