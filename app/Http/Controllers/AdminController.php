<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;
use App\Models\Task;
use App\Models\Logproject;
use App\Models\Poreview;

class AdminController extends Controller
{
    public function get_sprint() {
    	$logsprint = Sprint::all();
    	return view('LogProject.logbook', ['logsprint' => $logsprint]);
    }

    public function get_task($id_sprint)
    {
    	$task = Task::where('sprint_id', $id_sprint)->get();
    	return response()->json($task);
    }

    public function store_logbook(Request $request)
    {
    	
    	$sprint = $request->input('sprint_id');
    	$kendala = $request->input('kendala');
    	$hasil = $request->file;
    	$file_hasil = $hasil->store('public/hasil');

    	$logProject = new Logproject;
    	$logProject->sprint_id = $sprint;
    	$logProject->kendala = $kendala;
    	$logProject->hasil_log = $file_hasil;
    	$logProject->tanggal = date('Y-m-d');
    	$logProject->save();

    	$logProject->log_project_task()->createMany($request->task);

    	return redirect('/log-book')->with('flashdata', 'sukses');
    }

    public function get_logproject() {
        $logpro = Logproject::with('task')->get();
        // dd($logpro);
        return view ('PoReview.poreview', ['logpro' => $logpro]);
    }

    public function get_review() {
        $review = Poreview::all();
        return view('PoReview.poreview', ['review' => $review]);
    }
    public function store_review(Request $request)
    {
        $data = new Poreview;
        $data->rekomendasi = $request->rekomendasi;
        $data->validasi = $request->validasi;
        $data->log_project_id = $request->log_project_id;
        $data->save();

        return redirect('/po-review')->with('flashdata', 'Sukses');
    }

      public function hasil_review(){
        $logpro = Logproject::with('task')->get();
        return view('HasilReview.hasil', ['logpro' => $logpro]);
    }
}
