<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = array('id', 'text', 'author');

    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }


}
