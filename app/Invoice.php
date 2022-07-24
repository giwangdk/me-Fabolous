<?php

namespace App;

use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'transaction_id', 'status_pembayaran','status_penyewaan', 'kode',
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

    public function invoice()
    {
        return $this->belongsTo(AppTransaction::class, 'transaction_id', 'id');
    }
}
