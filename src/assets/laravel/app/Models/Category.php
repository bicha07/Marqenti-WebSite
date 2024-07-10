<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = ['name'];

    // If you're not using Laravel's default timestamps, you can disable them by setting the $timestamps property to false.
    public $timestamps = false;

    // If your table name is not the plural form of the model name, specify it using the $table property.
    // protected $table = 'your_table_name';

    // If your primary key is not 'id', specify the custom key name.
    // protected $primaryKey = 'your_primary_key';

    // If you need to customize the data type of the primary key, set the $keyType property.
    // protected $keyType = 'string';

    // If your primary key is not auto-incrementing, set the $incrementing property to false.
    // public $incrementing = false;
}
