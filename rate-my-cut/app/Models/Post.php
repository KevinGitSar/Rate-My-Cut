<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){

        if($filters['category'] ?? false){
            $query->where('category', 'like', request('category'));
                // ->orWhere('hair_length', 'like', $filters['length'])
                // ->orWhere('hair_type', 'like', $filters['type'])
                // ->orWhere('hair_style', 'like', '%' . $filters['style'] . '%');
        }

        if($filters['length'] ?? false){
            $query->where('hair_length', 'like', request('length'));
        }

        if($filters['type'] ?? false){
            $query->where('hair_type', 'like', request('type'));
        }

        if($filters['style'] ?? false){
            $query->where('hair_style', 'like', '%' . request('style') . '%');
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'image',
        'description',
        'category',
        'hair_length',
        'hair_style',
        'hair_type',
        'location_name',
        'location_address'
    ];
}
