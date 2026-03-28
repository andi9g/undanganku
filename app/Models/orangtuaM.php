<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orangtuaM extends Model
{
    protected $table = 'orangtua';
    protected $primaryKey = 'idorangtua';
    protected $guarded = [];
    protected $connection = 'mysql';
        
    //protected $fillable = ['name1','name2'];
        
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
