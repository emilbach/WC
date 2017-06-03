<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{

    //protected $table = 'contracts';
    protected $fillable = [
        'contract_no', 'old_contract_no', 'contract_type', 'starting_date', 'suspension_date', 'closing_date', 'status', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


}
