<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
	protected $table='sprint';

	public function log_project() {
    	return $this->hasMany('App\Models\Logproject');
    }

    public function task() {
    	return $this->hasMany('App\Models\Task');
    }

    
}
