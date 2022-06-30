<?php

namespace App\Models;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PointOfSell extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            if ($model->isDirty(['street', 'city'])) {
                $response = Http::get("https://nominatim.openstreetmap.org/search", [
                    'street' => $model->street,
                    'city' => $model->city,
                    'country' => 'belgium',
                    'format' => 'json'
                ]);

                if (empty($response[0])) {
                    $model->latitude = 0;
                    $model->longitude = 0;
                } else {

                    $model->latitude = $response[0]['lat'];
                    $model->longitude = $response[0]['lon'];
                }
            }
        });
    }
}
