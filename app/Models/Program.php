<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'category_id',
        'image_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }
}
