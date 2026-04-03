<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class agendaM extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'idagenda';
    protected $guarded = [];
    protected $connection = 'mysql';
        
    //protected $fillable = ['name1','name2'];
        
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
