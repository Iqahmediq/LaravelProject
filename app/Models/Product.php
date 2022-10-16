<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        protected $fillable = [
            'name',
            'prix',
            'Qte',
            'image',
            'description',
            'category',
        ];
    public function category(){
            return $this->belongsTo(Category::class)->orderBy('created_at', 'desc');
        }
}
