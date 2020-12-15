<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'name', 'costperone','desc',
    ];
    public function user(){
        return $this->belongsTo("App\User");
    }

    public function dvproduct(){
        return $this->belongsTo("App\Dvproduct");
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($product) {
            $product->dvproduct()->delete();

        });
    }

}
