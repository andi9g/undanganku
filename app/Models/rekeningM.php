<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rekeningM extends Model
{
    protected $table = 'rekening';
    protected $primaryKey = 'idrekening';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    //protected $fillable = ['name1','name2'];
    
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
