<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {


    protected $fillable = [
        'comment',
        'article_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
