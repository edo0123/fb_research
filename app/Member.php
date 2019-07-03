<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    protected $fillable = [
        'first_name', 'last_name', 'fb_id', 'gender'
    ];

    public $timestamps = false;

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function postEmotion()
    {
        return $this->hasMany(Post_emotion::class);
    }

    public function postComment()
    {
        return $this->hasMany(Post_comment::class);
    }

    public static function add($fields)
    {
        $member = new static;
        $member->fill($fields);
        $member->save();

        return $member;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

}
