<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        //Change filter to be more precise
        if($filters['category1'] ?? false){
            $query->orWhere('category', 'like', request('category1'));
        }

        if($filters['category2'] ?? false){
            $query->orWhere('category', 'like', request('category2'));
        }

        if($filters['category3'] ?? false){
            $query->orWhere('category', 'like', request('category3'));
        }

        if($filters['category4'] ?? false){
            $query->orWhere('category', 'like', request('category4'));
        }

        if($filters['length1'] ?? false){
            $query->orWhere('hair_length', 'like', request('length1'));
        }

        if($filters['length2'] ?? false){
            $query->orWhere('hair_length', 'like', request('length2'));
        }

        if($filters['length3'] ?? false){
            $query->orWhere('hair_length', 'like', request('length3'));
        }

        if($filters['length4'] ?? false){
            $query->orWhere('hair_length', 'like', request('length4'));
        }

        if($filters['length5'] ?? false){
            $query->orWhere('hair_length', 'like', request('length5'));
        }

        if($filters['length6'] ?? false){
            $query->orWhere('hair_length', 'like', request('length6'));
        }

        if($filters['length7'] ?? false){
            $query->orWhere('hair_length', 'like', request('length7'));
        }

        if($filters['length8'] ?? false){
            $query->orWhere('hair_length', 'like', request('length8'));
        }

        if($filters['length9'] ?? false){
            $query->orWhere('hair_length', 'like', request('length9'));
        }

        if($filters['type1'] ?? false){
            $query->orWhere('hair_type', 'like', request('type1'));
        }

        if($filters['type2'] ?? false){
            $query->orWhere('hair_type', 'like', request('type2'));
        }

        if($filters['type3'] ?? false){
            $query->orWhere('hair_type', 'like', request('type3'));
        }

        if($filters['type4'] ?? false){
            $query->orWhere('hair_type', 'like', request('type4'));
        }

        if($filters['style'] ?? false){
            $query->orWhere('hair_style', 'like', '%' . request('style') . '%');
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
