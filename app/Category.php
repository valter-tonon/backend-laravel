<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Uuid;

    protected $fillable = [
      'name',
      'genero_id'
    ];

    public $incrementing = false;
}
