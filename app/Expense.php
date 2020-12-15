<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'deliverer_id', 'Cost','date','Category',
    ];
}
