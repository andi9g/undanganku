<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\undanganM;
use App\Models\galleryM;
use App\Models\rekeningM;
use App\Models\gaunM;
use App\Models\orangtuaM;
use App\Models\lokasiM;
use App\Models\agendaM;
use App\Models\pasfotoM;
use App\Models\identitaspengantinM;
use App\Attributes\Locked;
use Auth;
use Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;



class DetailLive extends Component
{
    use WithFileUploads;

    #[Validate('image|max:10000')] 
    #[Validate(['photos.*' => 'image|max:10000'])]
    

    #[Locked]
    public $idundangan, $bank;

    public $namapengantinpria, $namapengantinwanita, $tanggal, $namagaun, $waktugaun, $namabank, $nomorrekening, $atasnama, $namalokasi, $alamat, $lat, $long;
    public $namabapak, $namaibu, $fotop, $fotol;
    public $namalengkappengantinpria, $namalengkappengantinwanita;
    public $statusanakwanita, $statusanakpria;
    public $pasfotol, $pasfotop;
    public $jamakad, $jamresepsi;

    public $photo,$fotopengantin, $gaun;
    public $photos = [];
    public $latitude;
    public $longitude;

    public function mount($idundangan)
    {
        $this->idundangan = $idundangan;
        $undangan = undanganM::where(['idundangan' => $idundangan, 'iduser' => Auth::user()->iduser])->first();
        $this->tanggal = $undangan->tanggal;
        $this->namapengantinpria = $undangan->identitaspengantin->namapengantinpria;
        $this->namapengantinwanita = $undangan->identitaspengantin->namapengantinwanita;
        $this->namalengkappengantinpria = $undangan->identitaspengantin->namalengkappengantinpria;
        $this->namalengkappengantinwanita = $undangan->identitaspengantin->namalengkappengantinwanita;
        $this->statusanakwanita = $undangan->identitaspengantin->statusanakwanita;
        $this->statusanakpria = $undangan->identitaspengantin->statusanakpria;
        $this->namagaun = "";
        $this->waktugaun = "";
        $this->namalokasi = "";
        $this->alamat = "";
        $this->latitude = $undangan->lokasi->lat ?? 0.9928232712585363;
        $this->longitude = $undangan->lokasi->long ?? 104.62363765413463;

        // dd($this->latitude, $this->longitude);

        $this->bank = [
            "BCA" => "https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg",
            "BRI" => "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/BRI_2025_%28with_full_name%29.svg/250px-BRI_2025_%28with_full_name%29.svg.png",
            "BNI" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Bank_Negara_Indonesia_logo_%282004%29.svg/250px-Bank_Negara_Indonesia_logo_%282004%29.svg.png",
            "BSI" => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Bank_Syariah_Indonesia.svg/250px-Bank_Syariah_Indonesia.svg.png",
        ];
    }

    public function render()
    {
        $undangan = undanganM::where(['idundangan' => $this->idundangan, 'iduser' => Auth::user()->iduser])->first();
        $identitaspengantin = identitaspengantinM::where('idundangan', $this->idundangan)->first();
        $gallery = $undangan->gallery()->get();
        $datagaun = $undangan->gaun()->get();
        $databank = $undangan->rekening()->get();
        $datalokasi = $undangan->lokasi()->first();
        $this->fotopengantin = $identitaspengantin->fotopengantin??"not-available.jpg";

        $this->jamakad = $undangan->agenda->where("agenda", "akad")->first()?->jam;
        $this->jamresepsi = $undangan->agenda->where("agenda", "resepsi")->first()?->jam;
        $this->namalokasi = $datalokasi->namalokasi ?? "";
        $this->alamat = $datalokasi->alamat ?? "";

        $this->fotop = $undangan->pasfoto->where("pihak", "P")->first()?->foto;
        $this->fotol = $undangan->pasfoto->where("pihak", "L")->first()?->foto;


        $orangtuaP = orangtuaM::where([
            "idundangan"=>$this->idundangan,
            "pihak" => "P"
            ])->get();
        $orangtuaL = orangtuaM::where([
            "idundangan"=>$this->idundangan,
            "pihak" => "L"
            ])->get();
        

        return view('livewire.detail-live', [
            'undangan' => $undangan,
            'identitaspengantin' => $identitaspengantin,
            'gallery' => $gallery,
            'datagaun' => $datagaun,
            'databank' => $databank,
            'orangtuaP' => $orangtuaP,
            'orangtuaL' => $orangtuaL,
        ]);
    }


    public function agenda($agenda)
    {
        $this->validate([
            'jam'.$agenda => 'required',
        ],[
            "required" => "Field wajib di isi.",
        ]);

        agendaM::updateOrCreate([
            "idundangan" => $this->idundangan,
            "agenda" => $agenda,
        ],[
            "jam" => $this->{"jam".$agenda},
        ]);

        LivewireAlert::title('Success')->success()->show();
        
    }

    public function removePhoto()
    {
        $this->photo->delete();
        $this->photo = null;
    }
    public function removeGaun()
    {
        $this->gaun->delete();
        $this->gaun = null;
    }

    public function removePhotos($index)
    {
        $photo = $this->photos[$index];
        $photo->delete();
        unset($this->photos[$index]);
        $this->photos = array_values($this->photos);
    }

    public function save_gaun()
    {
        $this->validate([
            'namagaun' => 'required',
            'waktugaun' => 'required',
            'gaun' => 'required',
        ]);
        $path = $this->gaun->store('photos', 'public');
        $undangan = undanganM::where(['idundangan' => $this->idundangan, 'iduser' => Auth::user()->iduser])->first();
        
        gaunM::create([
            'idundangan' => $this->idundangan,
            'namagaun' => $this->namagaun,
            'fotogaun' => $path,
            'waktugaun' => $this->waktugaun,
        ]);

        $this->gaun->delete();
        $this->reset(['gaun', 'namagaun', 'waktugaun']);

        
        LivewireAlert::title('Success')->success()->show();
    

    }
    public function save_image()
    {
        $this->validate([
            'photo' => 'required|image|max:10000',
        ],[
            "image" => "bukan gambar",
            "max" => "ukuran tidak sesuai",
        ]);
        // dd(phpinfo());
        $path = $this->photo->store('photos', 'public');
        $undangan = undanganM::where(['idundangan' => $this->idundangan, 'iduser' => Auth::user()->iduser])->first();
        
        identitaspengantinM::updateOrCreate([
            'idundangan' => $this->idundangan,
        ],[
            'fotopengantin' => $path,
        ]);

        $this->photo->delete();
        $this->photo = null;

        
        LivewireAlert::title('Success')->success()->show();
    

    }


    public function removePhotol()
    {
        $this->pasfotol->delete();
        $this->pasfotol = null;
    }
    public function updatepasfotol()
    {
        $this->validate([
            'pasfotol' => 'required',
        ],[
            "required" => "Field wajib di isi.",
        ]);

        $path = $this->pasfotol->store("photos", "public");
        pasfotoM::updateOrCreate([
            "idundangan" => $this->idundangan,
            "pihak" => "L",
        ], [
            "foto" => $path
        ]);

        $this->reset("pasfotol");

        LivewireAlert::title('Success')->success()->show();
        
    }
    public function removePhotop()
    {
        $this->pasfotop->delete();
        $this->pasfotop = null;
    }
    public function updatepasfotop()
    {
        $this->validate([
            'pasfotop' => 'required',
        ],[
            "required" => "Field wajib di isi.",
        ]);

        $path = $this->pasfotop->store("photos", "public");
        pasfotoM::updateOrCreate([
            "idundangan" => $this->idundangan,
            "pihak" => "P",
        ], [
            "foto" => $path
        ]);

        $this->reset("pasfotop");

        LivewireAlert::title('Success')->success()->show();
        
    }


    public function save_images()
    {
        $this->validate([
            'photos' => 'required',
        ]);
        foreach ($this->photos as $index => $photo) {
            $path = $photo->store('photos', 'public');
            
            galleryM::create([
                'idundangan' => $this->idundangan,
                'fotogallery' => $path,
                ]);
        }
        
        $this->reset('photos');
        
        LivewireAlert::title('Success')->success()->show();
    }


    public function hapusgambar($idgallery)
    {
        
        LivewireAlert::title('Hapus Foto Gallery')
        ->text('Are you sure you want to delete this data?')
        ->asConfirm()
        ->onConfirm('deleteFotoGallery', ['idgallery' => $idgallery])
        ->show();

    }

    public function deleteFotoGallery($array)
    {
        $idgallery = $array['idgallery'];

        $gallery = galleryM::where('idgallery', $idgallery)
            ->where('idundangan', $this->idundangan)
            ->firstOrFail();

        if ($gallery->fotogallery && Storage::disk('public')->exists($gallery->fotogallery)) {
            Storage::disk('public')->delete($gallery->fotogallery);
        }

        $gallery->delete();

        
        LivewireAlert::title('Success')->success()->show();
    }


    public function hapusgaun($idgaun)
    {
        
        LivewireAlert::title('Hapus Foto gaun')
        ->text('Are you sure you want to delete this data?')
        ->asConfirm()
        ->onConfirm('deletegaun', ['idgaun' => $idgaun])
        ->show();

    }

    public function deletegaun($array)
    {
        $idgaun = $array['idgaun'];

        $gaun = gaunM::where('idgaun', $idgaun)
            ->where('idundangan', $this->idundangan)
            ->firstOrFail();

        if ($gaun->fotogaun && Storage::disk('public')->exists($gaun->fotogaun)) {
            Storage::disk('public')->delete($gaun->fotogaun);
        }

        $gaun->delete();

        
        LivewireAlert::title('Success')->success()->show();
    }

    public function save_bank()
    {
        $this->validate([
            "namabank" => "required",
            "nomorrekening" => "required",
            "atasnama" => "required",
        ]);    

        rekeningM::create([
            'idundangan' => $this->idundangan,
            'namabank' => $this->namabank,
            'nomorrekening' => $this->nomorrekening,
            'atasnama' => $this->atasnama,
            'urlgambar' => $this->bank[$this->namabank] ?? null,
        ]);

        $this->reset(['namabank', 'nomorrekening', 'atasnama']);

        
        LivewireAlert::title('Success')->success()->show();
    }

    public function hapusbank($idrekening)
    {
        

        LivewireAlert::title('Hapus Foto rekening')
        ->text('Are you sure you want to delete this data?')
        ->asConfirm()
        ->onConfirm('deleterekening', ['idrekening' => $idrekening])
        ->show();

    }

    public function deleterekening($array)
    {
        $idrekening = $array['idrekening'];

        $rekening = rekeningM::where('idrekening', $idrekening)
            ->where('idundangan', $this->idundangan)
            ->delete();
        
        LivewireAlert::title('Success')->success()->show();
    }

    public function save_lokasi()
    {
        $this->validate([
            'namalokasi' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // dd($this->latitude, $this->longitude);

        lokasiM::updateOrCreate([
            'idundangan' => $this->idundangan,
        ],[
            'namalokasi' => $this->namalokasi,
            'alamat' => $this->alamat,
            'lat' => $this->latitude,
            'long' => $this->longitude,
        ]);

        $this->reset(['namalokasi', 'alamat']);

        LivewireAlert::title('Success')->success()->show();
    }

    public function updateortup()
    {
        $this->validate([
            'namabapak' => 'required',
            'namaibu' => 'required',
        ],[
            "required" => "Field wajib di isi.",
        ]);

        orangtuaM::updateOrCreate([
            "idundangan" => $this->idundangan,
            "pihak" => "P",
        ], [
            "namabapak" => $this->namabapak,
            "namaibu" => $this->namaibu,
        ]);

        $this->reset(["namabapak", "namaibu"]);

        Flux::modals()->close();

        LivewireAlert::title('Success')->success()->show();
    }
    public function updateortul()
    {
        $this->validate([
            'namabapak' => 'required',
            'namaibu' => 'required',
        ],[
            "required" => "Field wajib di isi.",
        ]);

        orangtuaM::updateOrCreate([
            "idundangan" => $this->idundangan,
            "pihak" => "L",
        ], [
            "namabapak" => $this->namabapak,
            "namaibu" => $this->namaibu,
        ]);

        $this->reset(["namabapak", "namaibu"]);

        Flux::modals()->close();

        LivewireAlert::title('Success')->success()->show();
    }
}
