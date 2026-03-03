<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class galleryM extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'idgallery';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    //protected $fillable = ['name1','name2'];
    
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }
}
