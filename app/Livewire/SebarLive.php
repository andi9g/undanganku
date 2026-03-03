<?php

namespace App\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use App\Models\sebarundanganM;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\undanganM;


class SebarLive extends Component
{
    use WithPagination;

    #[Locked]
    public $idundangan, $kodenegara;

    public $namapenerima, $emailpenerima, $whatsapppenerima;

    
        
    public $search = '';
        
    public function updateSearch()
    {
        $this->resetPage();
    }
    

    public function mount($idundangan)
    {
        $this->idundangan = $idundangan;
        $this->kodenegara = "62";
        $this->namapenerima = "";
        $this->emailpenerima = "";
        $this->whatsapppenerima = "";
    }


    public function render()
    {
        $undangan = undanganM::where(["idundangan" => $this->idundangan, "iduser" => Auth::user()->iduser])->first();
        $data = sebarundanganM::when($this->search, function($query, $key) {
            $query->where(function($query2) use ($key) {
                $query2->where('namapenerima', 'like', "%$key%")
                ->orWhere('whatsapppenerima', 'like', "%$key%");
            });
        })
        ->where('idundangan', $this->idundangan)
        ->paginate(15);
        
        $data->appends(['search', 'limit']);



        return view('livewire.sebar-live', [
            "data" => $data,
            "undangan" => $undangan->first(),
        ]);
    }



    public function tambahTamuUndangan()
    {
        $this->validate([
            "namapenerima" => "required",
            "whatsapppenerima" => "numeric|digits_between:10,15",
        ]);


        $whatsapppenerima = $this->kodenegara . ((int)$this->whatsapppenerima);
        $kodepenerima = Str::random(10);

        sebarundanganM::create([
            "idundangan" => $this->idundangan,
            "kodepenerima" => $kodepenerima,
            "namapenerima" => $this->namapenerima,
            "emailpenerima" => $this->emailpenerima,
            "whatsapppenerima" => $whatsapppenerima,
        ]);

        \Flux::modals()->close();

        
        LivewireAlert::title('Success')->success()->show();
    }
}
