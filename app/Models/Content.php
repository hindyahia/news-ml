<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public $appends = ['image_url'];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = storeFile($value, 'images/contents', $this->image);
    }
    public function getImageUrlAttribute()
    {
        return empty($this->image) ? null : file_url($this->image);
    }
}
