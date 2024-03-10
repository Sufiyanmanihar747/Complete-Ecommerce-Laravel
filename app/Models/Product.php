<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'company',
        'category',
        'images',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin _id');
    }
}
