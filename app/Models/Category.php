<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['title'];

    public function program()
    {
        return $this->belongsTo('App\Models\Program', 'category_id');
    }
}
