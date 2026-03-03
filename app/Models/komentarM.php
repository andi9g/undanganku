<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class komentarM extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'idkomentar';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    //protected $fillable = ['name1','name2'];
    
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
