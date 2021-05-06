<?php

namespace App;

use App\User;
use App\Makeupartist;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'review',
        'user_id',
        'mua_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mua()
    {
        return $this->belongsTo(Makeupartist::class, 'mua_id');
    }
}
