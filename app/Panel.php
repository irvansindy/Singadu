<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Panel extends Model
{
    use Notifiable;
    // use SoftDeletes;
    
    protected $table = 'panel_maintenance';
    protected $fillable = [
        'id_maintenance',
        'id_client',
        'id_pic',
        'title',
        'id_type',
        'description',
        'description_from_teknisi',
        'status',
        'file1',
        'file2',
        'file3',
        'tanggal_pengajuan',
        'tanggal_selesai'
    ];

    // function
}