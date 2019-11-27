<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sprint;

class SprintController extends Controller
{
    public function index(){
    	$sprint = Sprint::all();
    	return response()->json($sprint);

    	// return view('sprint', ['sprint' => $sprint]);
    }

}
