<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sebarundanganM extends Model
{
    protected $table = 'sebarundangan';
    protected $primaryKey = 'idsebarundangan';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    //protected $fillable = ['name1','name2'];
    
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
