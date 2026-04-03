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

    public function getPesanWa($kode)
    {
        $undangan = undanganM::where(["idundangan" => $this->idundangan, "iduser" => Auth::user()->iduser])->first();
        $sebarundangan = sebarundanganM::where("kodepenerima",$kode)->first();
        $urlUndangan = asset("share/{$undangan->kode}/{$kode}");

        $tanggalFormat = \Carbon\Carbon::parse($undangan->tanggal)->translatedFormat('l, d F Y');
        $nama = $sebarundangan->namapenerima ?? 'Bapak/Ibu/Saudara/i';

        $pesan = <<<TEXT
    Assalamu’alaikum Warahmatullahi Wabarakatuh

    “Bukan tentang menemukan yang sempurna, tapi tentang menerima dalam ketidaksempurnaan.”🕊️🕊️

    Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang {$nama} untuk hadir dalam acara pernikahan putra - putri kami:

    ✨ {$undangan->identitaspengantin->namapengantinpria} & {$undangan->identitaspengantin->namapengantinwanita} ✨

    Yang insyaAllah akan dilaksanakan pada:
    📅 {$tanggalFormat}
    📍 {$undangan->lokasi->namalokasi} ({$undangan->lokasi->alamat})

    Untuk informasi lengkap mengenai waktu dan lokasi, silakan mengakses undangan digital kami melalui tautan berikut:
    🔗 {$urlUndangan}

    Merupakan suatu kebahagiaan dan kehormatan bagi kami apabila berkenan hadir serta memberikan doa restu.

    Atas kehadiran dan doa restunya, kami ucapkan terima kasih.

    Wassalamu’alaikum Warahmatullahi Wabarakatuh
    TEXT;

        return $pesan;
    }


    public function copyPesan($id)
    {
        $data = sebarundanganM::where("idsebarundangan", $id)->first();

        $pesan = $this->getPesanWa($data->kodepenerima);

        $this->dispatch('copy-text', text: $pesan);

        LivewireAlert::title('Success')->text("URL telah disalin")->success()->show();
    }
}
