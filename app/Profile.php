<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'title','description','url', 'image'
    ];

    public function profileImage()
    {
        $imagePath = ($this->image) ?  $this->image : '/profile/HmPynj464f920PIjBsChVnBBEDLKFrT8zZL81CiL.png';
        return  '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User');
    }
}
