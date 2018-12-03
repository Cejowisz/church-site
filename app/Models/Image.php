<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['file_name', 'file_path'];

    public function program()
    {
        return $this->belongsTo('App\Models\Program');
    }
}
