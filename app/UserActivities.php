<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivities extends Model
{
    protected $fillable = ['user_id', 'action', 'product_id'];

    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function product ()
    {
        return $this->belongsTo('App\Product');
    }
}
