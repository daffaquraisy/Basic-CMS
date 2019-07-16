<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    public $table = 'jobs';
    protected $guarded = [];
    protected $fillable = ['career'];

    public function teams()
    {
        return $this->hasMany('App\Teams');
    }
}
