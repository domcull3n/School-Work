<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Css extends Model {

    protected $primaryKey = "template_id";

    protected $table = 'css';

    protected $fillable = [
        'name',
        'active_state',
        'description',
        'css'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
