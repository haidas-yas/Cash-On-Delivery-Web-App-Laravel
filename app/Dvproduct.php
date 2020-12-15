<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dvproduct extends Model
{
    protected $fillable = [
        'deliverer_id', 'product_id','quantity',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');

    }
    public function product(){
        return $this->belongsTo("App\Product");
    }

    public function order(){
        return $this->belongsTo("App\Order");
    }




}
