<?php

namespace App\Models;

use App\Enums\Cars\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $fillable = [
    //     'brand',
    //     'model',
    //     'description',
    //     'vin',
    //     'category',
    // ];

    protected $casts = [
        'status' => Status::class
    ];
    protected $guarded = [];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function getCanDeleteAttribute() {
        return match ($this->status) {
            Status::DRAFT => true,
            Status::CANCELLED => true,
            default => false,
        };
    }

    public function scopeOfActive($query) {
        return $query->where('status', Status::ACTIVE); 
    }
}
