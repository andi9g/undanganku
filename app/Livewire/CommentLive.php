<?php

namespace App\Livewire;

use Livewire\Component;
use App\Attributes\Locked;
use Auth;
use Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\komentarM;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;


class CommentLive extends Component
{
    use WithPagination;

    #[Locked]
    public $idundangan;

    public $search;

    public function updateSearch()
    {
        $this->resetPage;
    }

    public function mount($idundangan)
    {
        $this->idundangan = $idundangan;
    }

    public function render()
    {
        $komentar = komentarM::where("idundangan", $this->idundangan)
        ->when($this->search, function ($query) {
            $query->where('namakomentar', 'like', '%' . $this->search . '%')
                    ->orWhere('komentar', 'like', '%' . $this->search . '%');
        })
        ->orderBy("created_at", "desc")
        ->paginate(20);

        return view('livewire.comment-live', [
            "komentar" => $komentar,
        ]);
    }

    public function tampil($idkomentar)
    {
        $tampilkan = komentarM::where("idkomentar", $idkomentar)->first()->tampilkan;
        
        if($tampilkan == 0) {
            $tampilkan = 1;
            }else {
            $tampilkan = 0;
        }

        komentarM::updateOrCreate([
            "idundangan" => $this->idundangan,
            "idkomentar" => $idkomentar,
        ], [
            "tampilkan" => $tampilkan,
        ]);

        LivewireAlert::title('Success')->success()->show();
    }
}
