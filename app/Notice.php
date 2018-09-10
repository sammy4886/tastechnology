<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'type',
        'is_published',
        'content',
        'author',
        'quote',
        'view'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

//    public function setNameAttribute($value)
//    {
//        $this->attributes['name'] = $value;
//
//        if ( ! $this->exists)
//        {
//            $this->setUniqueSlug($value, '');
//        }
//    }
//
//    /**
//     * Recursive routine to set a unique slug.
//     *
//     * @param string $name
//     * @param mixed $extra
//     */
//    protected function setUniqueSlug($name, $extra)
//    {
//        $slug = str_slug($name . '-' . $extra);
//
//        if (static::whereSlug($slug)->exists())
//        {
//            $this->setUniqueSlug($name, $extra + 1);
//
//            return;
//        }
//
//        $this->attributes['slug'] = $slug;
//    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
