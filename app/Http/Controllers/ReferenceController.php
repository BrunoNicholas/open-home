<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:super-admin|admin|editor|lawyer')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $depId=null)
    {
        request()->validate([
            'user_id'   => 'required',
            'topic'     => 'required',
            'status' => 'required',

        ]);
        Reference::create($request->all());

        return back()->with('success','Reference added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $depId=null)
    {
        request()->validate([
            'user_id'   => 'required',
            'topic'     => 'required',
            'status' => 'required',

        ]);
        Reference::find($id)->update($request->all());

        return back()->with('success','Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $depId=null)
    {
        $item = Reference::find($id);
        $item->delete();

        return back()->with('danger', 'Department reference deleted successfully!');
    }
}
