<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measuring extends Model
{
    protected $fillable = [
        'folder_no', 'measuring_tool', 'size', 'register_no', 'old_no', 'stamp_no', 'box_no', 'manhole_no', 'current_measure', 'installing_date', 'notes', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
