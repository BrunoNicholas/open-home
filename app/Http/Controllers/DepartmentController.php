<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Reference;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:super-admin|admin|editor')->except('index','show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('system.departments.index', compact(['departments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('system.departments.create', compact(['departments']));
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
            'name'      => 'required',
            'created_by'     => 'required',
            'status' => 'required',

        ]);
        Department::create($request->all());

        return redirect()->route('departments.index')->with('success',config('app.name') .' department saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        $references = Reference::where('department_id', $id);
        if (!$department) {
            return redirect()->route('departments.index')->with('danger', 'Department Not Found!');
        }
        return view('system.departments.show', compact(['department','references']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        $departments = Department::all();
        if (!$department) {
            return redirect()->route('departments.index')->with('danger', 'Department Not Found!');
        }
        return view('system.departments.edit', compact(['department','departments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name'      => 'required',
            'created_by'     => 'required',
            'status' => 'required',
        ]);
        Department::find($id)->update($request->all());

        return redirect()->route('departments.index')->with('success',config('app.name') .' department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Department::find($id);
        $item->delete();

        return redirect()->route('departments.index')->with('danger', 'Department deleted successfully');
    }
}
