<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $with = ['user'];

    //
    protected $fillable = [
        'title', 'description', 'tags'
    ];   

    protected $hidden = [
        'user_id'
    ];   

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTagsAttribute($value)
    {
        return explode(',',$value);
    }

    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = implode(',',$value);
    }

}
