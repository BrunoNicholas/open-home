<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Question;
use App\Models\Role;
use App\User;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users 	= User::all();
    	$roles 	= Role::all();
        $questions      = Question::all();
        $departments    = Department::all();
        return view('admin.index', compact(['users','roles','departments','questions']));
    }
}
