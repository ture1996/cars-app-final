<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'engine', 'year', 'number_of_doors', 'is_automatic', 'max_speed'];

    public $timestamps = false;

    public function scopeSearchByBrand ($query, $brand){

        return $query->where('brand', $brand);

    }

    public function scopeSearchByModel ($query, $model){

        return $query->where('model', $model);

    }
}
