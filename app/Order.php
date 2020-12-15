<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'deliverer_id', 'product_id', 'order_status','responsible_id','quantity', 'totalprice', 'client_name', 'client_phone', 'client_city','client_addrs','note'
    ];
    public function user(){
        return $this->belongsTo("App\User");
    }
    public function product()
    {
        return $this->hasOne('App\Product');
    }
    public function dvproduct()
    {
        return $this->hasOne('App\Dvproduct');
    }
}

