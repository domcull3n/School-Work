<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

    protected $primaryKey = "content_id";

    protected $fillable = [
        'name',
        'alias',
        'description',
        'display_order'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
