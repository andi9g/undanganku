<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gaunM extends Model
{
    protected $table = 'gaun';
    protected $primaryKey = 'idgaun';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    //protected $fillable = ['name1','name2'];
    
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
