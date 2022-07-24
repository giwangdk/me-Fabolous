<?php

namespace App;

use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'transaction_id', 'status_pembayaran','status_penyewaan', 'kode', 'jenis_makeup'
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
        return $this->belongsTo(Pricelist::class, 'jenis_makeup', 'id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
