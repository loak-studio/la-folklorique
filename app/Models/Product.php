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

    public function getEuroOldPrice()
    {
        return $this->old_price / 100;
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

        self::creating(function ($model) {
            $new_slug = Str::slug($model->name);
            $already_exist = Product::where('slug', $new_slug)->get();
            if ($already_exist->count() > 0) {
                $no_ok = true;
                $index = 0;
                while ($no_ok) {
                    $index++;
                    $slug = $new_slug . '-' . $index;
                    if (!Product::where('slug', $slug)->get()->count() > 0) {
                        $no_ok = false;
                        $model->slug = $slug;
                    }
                }
            } else {
                $model->slug = $new_slug;
            }
        });
    }
}
