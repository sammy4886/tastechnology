<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [

        'slug',
        'title',
        'path',
        'file_name',
        'size',
        'extension',
        'count',
        'view',
        'is_published'
    ];

    protected $appends = [
        'public_path'
    ];


    /**
     * The attributes that should be typecast into boolean.
     *
     * @var array
     */
    public static $path = 'documents/';


    protected $casts = [
        'is_published'    => 'boolean'
    ];


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPublicPathAttribute()
    {
        $link = Document::$path . $this->path;
        return $link;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if ( ! $this->exists)
        {
            $this->setUniqueSlug($value, '');
        }
    }

    protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title . '-' . $extra);

        $extra = !empty($extra) ?: 1;

        if(static::whereSlug($slug)->exists())
        {
            $this->setUniqueSlug($title, $extra +1);

            return;
        }

        $this->attributes['slug'] = $slug;
    }

}
