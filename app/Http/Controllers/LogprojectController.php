<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Logproject;
use App\Models\Task;

class LogprojectController extends Controller
{
    public function log() {
    	$logs = Logproject::with('sprint')->get();
		return response()->json($logs);
    }

    
}
