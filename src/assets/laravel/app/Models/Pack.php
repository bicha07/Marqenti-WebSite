<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = ['name', 'price'];

    // Assuming you're using Laravel's default timestamps.
    public $timestamps = true;

    // Relationship to the Service model
public function services()
{
    return $this->belongsToMany(Service::class, 'pack_service', 'pack_id', 'service_id');
}

    // Method to calculate the total price of all services in the pack
    public function calculateTotalPrice()
    {
        $this->price = $this->services->sum('price');
        $this->price = round($this->price);
        $this->save();
    }

    // Optionally, if you want to automatically calculate the total price whenever a pack is retrieved,
    // you can use Eloquent's retrieved model event.
    protected static function booted()
    {
        static::retrieved(function ($pack) {
            $pack->calculateTotalPrice();
        });
    }
}
