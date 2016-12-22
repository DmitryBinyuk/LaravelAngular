<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = array('id', 'name');

    public $timestamps = false;

    /**
     * Get the phones for the brand.
     *  @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}