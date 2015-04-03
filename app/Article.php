<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	protected $fillable = [
        'title',
        'title_rus',
        'title_eng',
        'uri',
        'short',
        'short_rus',
        'short_eng',
        'full',
        'full_rus',
        'full_eng',
        'user_id'
    ];

    /**
     * @param $query
     */
    public function scopeCreated($query){

        $query->where('created_at', '<=', Carbon::now());

    }


    /**
     * @param $date
     */
    public function setPublishedAtAttribute($date){

        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);

    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * @return mixed
     */
    public function getTagListAttribute(){

        return $this->tags()->lists('id');
    }
}
