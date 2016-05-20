<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $primaryKey = "article_id";
    protected $table = "articles";

    protected $fillable = [
        'name',
        'title',
        'description',
        'html_snippet',
        'user_createdBy',
        'all_pages'
    ];


    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
        //$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);
    }


    /**
     * An article is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
