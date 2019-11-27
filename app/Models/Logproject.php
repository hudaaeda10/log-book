<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logproject extends Model
{
    protected $table = 'log_project';
    protected $fillable = ['tanggal', 'hasil_log', 'kendala', 'sprint_id'];

    public function sprint() {
    	return $this->belongsTo('App\Models\Sprint');
    }

    // public function task() {
    // 	return $this->belongsTo('App\Models\Task');
    // }

    public function log_project_task()
    {
    	return $this->hasMany(LogprojectTask::class, 'log_project_id');
    }
    public function task()
    {
        return $this->hasManyThrough(Task::class, LogprojectTask::class, 'log_project_id', 'id', '','task_id');
    }
    public function po_review()
    {
        // return $this->hasMany(Poreview::class, 'log_project_id');
        return $this->hasMany('App\Models\Poreview', 'log_project_id');
    }
}
