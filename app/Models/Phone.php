<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class Phone extends Model
{
    protected $table = 'phones';

    protected $fillable = array('id', 'name', 'processor', 'description', 'image');

     /**
    * Get the phone brand.
      *  @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function brand()
   {
       return $this->belongsTo(Brand::class);
   }
}