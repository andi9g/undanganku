<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lokasiM extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'idlokasi';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    //protected $fillable = ['name1','name2'];
    
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
