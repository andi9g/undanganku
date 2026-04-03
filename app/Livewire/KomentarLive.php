<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\undanganM;
use App\Models\sebarundanganM;
use App\Models\komentarM;
use Livewire\Attributes\Locked;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\WithPagination;

class KomentarLive extends Component
{
    
    use WithPagination;

    #[Locked]
    public $kode, $kodepenerima;

    public $namapenerima, $pesan;

    public $search = '';
    
    public function updateSearch()
    {
        $this->resetPage();
    }

    public function mount($kode, $kodepenerima)
    {
        $undangan = undanganM::where('kode', $this->kode)->firstOrFail();
        $penerima = sebarundanganM::where(['kodepenerima' => $this->kodepenerima, "idundangan" => $undangan->idundangan])->firstOrFail();

        $this->namapenerima = $penerima->namapenerima;
        $this->kode = $kode;
        $this->kodepenerima = $kodepenerima;
    }

    public function render()
    {
        $undangan = undanganM::where('kode', $this->kode)->firstOrFail();
        $penerima = sebarundanganM::where(['kodepenerima' => $this->kodepenerima, "idundangan" => $undangan->idundangan])->firstOrFail();
        
        
        $komentar = komentarM::where('idundangan', $undangan->idundangan)
        ->when($this->search, function ($query) {
            $query->where('namakomentar', 'like', '%' . $this->search . '%')
                  ->orWhere('komentar', 'like', '%' . $this->search . '%');
        })
        ->where("tampilkan", 1)
        ->orderBy("idkomentar", "desc")->paginate(5);

        $komentar->appends(['search', 'limit']);

        return view('livewire.komentar-live',
        [
            "penerima" => $penerima,
            "komentar" => $komentar
        ]);
    }


    public function submitKomentar()
    {
        $this->validate([
            'namapenerima' => 'required|string|max:255',
            'pesan' => 'required|string|max:200',
        ], [
            "required" => "Tidak boleh kosong!",
        ]);

        komentarM::create([
            'idundangan' => undanganM::where('kode', $this->kode)->firstOrFail()->idundangan,
            'namakomentar' => $this->namapenerima,
            'komentar' => $this->pesan,
        ]);

        $this->reset([
            'pesan',
            'namapenerima'
        ]);
        
        LivewireAlert::title('Pesan Terkirim')
        ->text('Pesan Anda telah berhasil dikirim. Pesan akan ditampilkan saat di Approve admin')
        ->success()
        ->toast()
        ->position('top-end')
        ->show();
    }

    
}
