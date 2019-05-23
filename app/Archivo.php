<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'files';
    
    protected $fillable = [
        'user_id','name','slug','description','archivo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
