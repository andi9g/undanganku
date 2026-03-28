<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class pasfotoM extends Model
{
    protected $table = 'pasfoto';
    protected $primaryKey = 'idpasfoto';
    protected $guarded = [];
    protected $connection = 'mysql';
        
    //protected $fillable = ['name1','name2'];
        
    public function undangan()
    {
        return $this->belongsTo(undanganM::class, 'idundangan', 'idundangan');
    }

    protected static function boot()
    {
        parent::boot();
    
        // Event ini akan otomatis berjalan SETIAP KALI data model di-update
        static::updating(function ($model) {
            
            // Cek apakah kolom 'foto' isinya berubah (isDirty)
            if ($model->isDirty('foto')) {
                
                // Ambil nama file/path foto yang lama sebelum ditimpa
                $fotoLama = $model->getOriginal('foto');
    
                // Jika foto lama ada di database dan file fisiknya ada di storage, hapus!
                if ($fotoLama && Storage::disk('public')->exists($fotoLama)) {
                    Storage::disk('public')->delete($fotoLama);
                }
            }
        });
    }
    
    
}
