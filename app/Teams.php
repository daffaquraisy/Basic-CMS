<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    public $table = 'teams';
    protected $guarded = [];
    protected $fillable = ['name', 'image', 'career_id'];

    public function jobs()
    {
        return $this->belongsTo('App\Jobs', 'career_id');
    }
}
