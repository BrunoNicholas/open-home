<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:super-admin|admin')->except('index','show','store','create','indexPoints');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPoints()
    {
        $incidents = Incident::all();
        $gpspont = array();

        foreach ($incidents as $val) {
            array_push($gpspont, explode(' ', $val->location));
        }

        $gpsponts = json_encode($gpspont);
        return $gpsponts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::latest()->paginate();
        return view('system.incidents.index',compact(['incidents']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incidents = Incident::latest()->paginate();
        return view('system.incidents.create',compact(['incidents']));
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
            'user_id'   => 'required',
            'title'     => 'required',
        ]);
        Incident::create($request->all());
        return redirect()->route('incidents.index')->with('success','Incident submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incident = Incident::find($id);
        if (!$incident) {
            return redirect()->route('incidents.index')->with('danger', 'The specified incident does not exist!');
        }
        return view('system.incidents.show',compact(['incident']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incident = Incident::find($id);
        if (!$incident) {
            return redirect()->route('incidents.index')->with('danger', 'The specified incident does not exist!');
        }
        return view('system.incidents.edit',compact(['incident']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'user_id'   => 'required',
            'title'     => 'required',
        ]);
        Incident::find($id)->update($request->all());

        return redirect()->route('incidents.show',$id)->with('success','Incident updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Incident::find($id);
        $item->delete();
        return redirect()->route('incidents.index')->with('danger', 'Incident Deleted Successfully');
    }
}
