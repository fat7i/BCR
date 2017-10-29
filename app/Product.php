<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    public static $rules = [
        'price' => 'required',
        'title' => 'required',
        'barcode' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['barcode', 'user_id', 'rate', 'price','title', 'description'];

    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function photos ()
    {
        return $this->hasMany('App\Photo');
    }

    public function category ()
    {
        return $this->belongsToMany('App\Category');
    }

    public function location ()
    {
        return $this->belongsToMany('App\Location')->select(array('title', 'price'))->orderBy('price', 'asc');
    }

    public function comments ()
    {
        return $this->hasMany('App\Comment');
    }

    public static function findByBarcode ( $barcode )
    {
        return self::with('user')
            ->with('photos')
            ->with('category')
            ->with('location')
            ->where('barcode', $barcode)
            ->first();
    }
}
