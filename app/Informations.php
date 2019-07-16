<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    public $table = 'informations';
    protected $fillable = ['title', 'description', 'image'];
}
