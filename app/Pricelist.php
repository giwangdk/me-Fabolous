<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Makeupartist;
use App\Category;
use App\Transaction;

class Pricelist extends Model
{
    protected $table = 'makeup_services';
    protected $fillable = ['name', 'price', 'description', 'mua_id',  'category_id'];

    public function makeupartist()
    {
        return $this->belongsTo(Makeupartist::class, 'mua_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'makeup', 'id');
    }
}
