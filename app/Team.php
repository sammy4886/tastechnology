<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'designation'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function delete(array $options = array())
    {
        if ($this->image)
        {
            $this->image->delete();
        }

        return parent::delete($options);
    }
}
