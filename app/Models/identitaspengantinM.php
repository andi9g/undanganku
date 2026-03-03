<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class identitaspengantinM extends Model
{
    protected $table = 'identitaspengantin';
    protected $primaryKey = 'ididentitaspengantin';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    //protected $fillable = ['name1','name2'];
    
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
