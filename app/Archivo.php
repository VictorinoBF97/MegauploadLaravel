<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getArchivoAttribute($archivo)
    {
        if( !$archivo || starts_with($archivo, 'http') ){
            return $archivo;
        }
        return Storage::disk('public')->url($archivo);
    }
}
