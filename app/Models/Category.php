<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
