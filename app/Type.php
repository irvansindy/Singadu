<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type_maintenance';
    protected $fillable = ['id_type', 'name_type'];
}
