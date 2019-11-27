<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $table = 'task';

    public function sprint(){
    	return $this->belongTo('App\Models\Sprint');
    }

    public function logproject() {
    	return $this->hasMany('App\Models\Logproject');
    }

    public function log_project_task()
    {
    	return $this->hasMany(LogprojectTask::class);
    }
}
