<?php

namespace App;

use App\Makeupartist;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['photos', 'mua_id'];
    public function makeupartist()
    {
        return $this->belongsTo(Makeupartist::class, 'mua_id');
    }
}
