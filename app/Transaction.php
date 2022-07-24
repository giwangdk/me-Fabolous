<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'nama', 'email', 'phone_number', 'makeup', 'total_price', 'date', 'address', 'status_pembayaran','status_penyewaan', 'kode',  'notes', 'mua_id', 'user_id'
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
        return $this->belongsTo(Makeupartist::class, 'mua_id', 'id');
    }
    public function pricelist()
    {
        return $this->belongsTo(Pricelist::class, 'makeup', 'id');
    }
    
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'transaction_id', 'id');
    }
}
