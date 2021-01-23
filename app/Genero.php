<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use Uuid;

    protected $fillable = [
        'name'
    ];
    public $incrementing = false;
}
