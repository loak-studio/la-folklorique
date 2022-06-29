<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'pictures' => 'array'
    ];

    public static function getVisiblesProducts()
    {
        return static::query()->where('visible', 1)->get();
    }

    public function getEuroPrice()
    {
        return $this->price / 100;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
