<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class undanganM extends Model
{
    protected $table = 'undangan';
    protected $primaryKey = 'idundangan';
    protected $guarded = [];
    protected $connection = 'mysql';
    
    //protected $fillable = ['name1','name2'];
    
    public function identitaspengantin()
    {
        return $this->hasOne(identitaspengantinM::class, 'idundangan', 'idundangan');
    }
    public function lokasi()
    {
        return $this->hasOne(lokasiM::class, 'idundangan', 'idundangan');
    }
    public function gallery()
    {
        return $this->hasMany(galleryM::class, 'idundangan', 'idundangan');
    }
    public function gaun()
    {
        return $this->hasMany(gaunM::class, 'idundangan', 'idundangan');
    }
    public function rekening()
    {
        return $this->hasMany(rekeningM::class, 'idundangan', 'idundangan');
    }
    public function komentar()
    {
        return $this->hasMany(komentarM::class, 'idundangan', 'idundangan');
    }
    public function sebarundangan()
    {
        return $this->hasMany(sebarundanganM::class, 'idundangan', 'idundangan');
    }
}
