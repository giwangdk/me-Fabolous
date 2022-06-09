<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;
use App\Category;
use App\Pricelist;
use App\Review;
use App\User;
use App\Transaction;

class Makeupartist extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'photo',
        'location',
        'instagram',
        'whatsapp',
        'description',
    ];
    protected $hidden = [];
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'mua_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'mua_id', 'id');
    }

    public function pricelists()
    {
        return $this->hasMany(Pricelist::class, 'mua_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'mua_id', 'id');
    }
}
