<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['image_url'];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = storeFile($value, 'images/contents', $this->image);
    }
    public function getImageUrlAttribute()
    {
        return empty($this->image) ?asset('admin_assets/logo-black.jpg') : file_url($this->image);
    }
    public function user() {
        return $this->belongsTo(User::Class);
    }
    public function category() {
        return $this->belongsTo(Category::Class);
    }
}
