<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyword extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    const  Status = [1 => 'not_processed' , 2 => 'in_processing' , 3 =>'processed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
