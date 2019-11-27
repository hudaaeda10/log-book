<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poreview extends Model
{
    protected $table="po_review";
    protected $fillable = ['rekomendasi', 'validasi', 'log_project_id'];

    public function log_project(){
    	// return $this->belongsTo(LogProject::class);
    	return $this->belongsTo('App\Models\Logproject', 'log_project_id');
    }
}
