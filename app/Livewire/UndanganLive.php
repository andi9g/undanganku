<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\undanganM;
use App\Models\identitaspengantinM;
use Str;
use Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class UndanganLive extends Component
{
    
    use WithPagination;

    public $namapengantinpria, $namapengantinwanita, $tanggal;
    
    public $search = '';
    
    public function updateSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        
        $data = undanganM::when($this->search, function($query, $key) {
            $query->where(function($query2) use ($key) {
                $query2->whereHas('identitaspengantin', function($query3) use ($key) {
                    $query3->where('namapengantinpria', 'like', '%'.$key.'%')
                           ->orWhere('namapengantinwanita', 'like', '%'.$key.'%');
                });
            });
        })
        ->where("iduser", Auth::user()->iduser)
        ->paginate(15);
        
        $data->appends(['search' => $this->search, 'limit']);
        return view('livewire.undangan-live', [
            'data' => $data,
        ]);
    }

    public function tambah() {
        $this->validate([
            'namapengantinpria' => 'required',
            'namapengantinwanita' => 'required',
            'tanggal' => 'required',
        ]);

        $kode = Str::random(10);
        
        $undangan = undanganM::create([
            'tanggal' => $this->tanggal,
            'kode' => $kode,
            'iduser' => Auth::user()->iduser,
        ]);

        identitaspengantinM::create([
            'namapengantinpria' => $this->namapengantinpria,
            'namapengantinwanita' => $this->namapengantinwanita,
            'idundangan' => $undangan->idundangan,
        ]);

        
        \Flux::modals()->close();
        
        LivewireAlert::title('Success')->success()->show();

    }
    
}
