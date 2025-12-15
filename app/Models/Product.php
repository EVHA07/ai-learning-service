<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'image_url',
        'start_date',
        'is_active',
        'user_id',
        'zoom_link'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'start_date' => 'datetime',
        'is_active' => 'boolean'
    ];
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get the user that owns the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}