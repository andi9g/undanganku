<div>
    <!-- FORM KOMENTAR -->
    <div class="mb-12
                rounded-3xl border border-jawa-gold/20
                bg-black/30 backdrop-blur-md p-8">


        <form class="space-y-5" wire:submit.prevent="submitKomentar">

            <!-- Nama -->
            <div>
                <input type="text" placeholder="Nama Anda"
                    wire:model="namapenerima"
                    class="w-full px-4 py-3 rounded-xl
                           bg-black/40 text-white
                           border border-jawa-gold/20
                           focus:outline-none focus:border-jawa-gold
                           placeholder:text-white/40">
            </div>

            <!-- Pesan -->
            <div>
                <textarea rows="4" placeholder="Tuliskan ucapan atau doa terbaik..."
                    wire:model="pesan"
                    class="w-full px-4 py-3 rounded-xl
                           bg-black/40 text-white
                           border border-jawa-gold/20
                           focus:outline-none focus:border-jawa-gold
                           placeholder:text-white/40"></textarea>
            </div>

            <!-- Button -->
            <div class="text-center">
                <button type="submit"
                    class="px-10 py-3 rounded-full w-full
                           bg-jawa-gold text-jawa-dark
                           font-semibold tracking-wide
                           hover:scale-105
                           hover:shadow-[0_10px_30px_rgba(197,160,89,0.5)]
                           transition">
                    Kirim Ucapan
                </button>
            </div>

        </form>
    </div>

    
    {{-- View Search Jawa Style --}}
<form class='max-w-sm ms-auto group mb-3'>
    <label for='search' class='sr-only'>Search</label>
    <div class='relative'>
        {{-- Ikon Search --}}
        <div class='absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none'>
            <svg class='w-4 h-4 text-jawa-gold/50 group-focus-within:text-jawa-gold transition-colors' 
                 aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'>
                <path stroke='currentColor' stroke-linecap='round' stroke-width='2' d='m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z'/>
            </svg>
        </div>

        {{-- Input Field --}}
        <input type='search' 
               id='search' 
               wire:model.live="search"
               class='block w-full p-3 ps-10 bg-black/40 backdrop-blur-md border border-jawa-gold/20 text-jawa-beige text-sm rounded-xl focus:ring-jawa-gold focus:border-jawa-gold shadow-lg placeholder:text-jawa-beige/30 transition-all' 
               placeholder='Cari komentar...' 
               required />

    
    </div>
</form>


    <div class="space-y-6 max-h-[800px] overflow-y-auto pr-2 mb-10">

       @foreach ($komentar as $item)
            <div class="rounded-2xl p-6 bg-black/25 backdrop-blur-md border border-jawa-gold/10 mb-4">
                <div class="flex items-start gap-3"> {{-- Menggunakan items-start agar avatar tetap di atas jika komentar panjang --}}
                    
                    {{-- Avatar --}}
                    <flux:avatar name="{{ $item->namakomentar }}" size="sm" class="bg-jawa-gold/20 text-white rounded-xl mt-1" />

                    <div class="flex-1"> {{-- Container untuk Nama dan Komentar --}}
                        <div class="flex justify-between items-center mb-1">
                            <p class="text-white font-semibold text-sm" style="text-transform:capitalize">
                                {{ $item->namakomentar }}
                            </p>
                            <span class="text-[10px] text-jawa-beige/60">
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <p class="text-jawa-beige text-sm leading-relaxed">
                            {{ ucfirst($item->komentar) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <flux:table :paginate='$komentar'>
        </flux:table>

    </div>
</div>
