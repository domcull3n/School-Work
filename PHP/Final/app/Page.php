<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    protected $primaryKey = "page_id";

    protected $fillable = [
        'name',
        'alias',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
