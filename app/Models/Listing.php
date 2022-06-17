<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'location', 'website', 
    'email', 'description', 'tags', 'logo', 'user_id'];

    public function scopefilter($query, array $filter){
        if($filter['tag'] ?? false)
        {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        //dd($query);
        if($filter['search'] ?? false)
        {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('company', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
