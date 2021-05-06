<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Makeupartist;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'photo'
    ];

    protected $hidden = [];

    public function makeupartists()
    {
        return $this->hasMany(Makeupartist::class, 'category_id', 'id');
    }
}
