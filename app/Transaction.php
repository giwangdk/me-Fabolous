<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name', 'email', 'phone_number', 'makeup', 'price', 'date', 'address', 'status_pembayaran', 'notes', 'mua_id', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function mua()
    {
        return $this->belongsTo(Makeupartist::class, 'user_id', 'id');
    }
}
