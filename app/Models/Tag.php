<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'active',
        'description',
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);

        $similarSlugs = static::where('slug', 'like', "{$this->slug}%")->count();

        if ($similarSlugs > 0) {
            $this->attributes['slug'] .= '-' . ($similarSlugs + 1);
        }
    }


    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
