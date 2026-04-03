<div>
    {{-- modal triger edit --}}
    <flux:modal name='tambah-tamu-undangan' class='md:w-md'>
        <form wire:submit.prevent='tambahTamuUndangan' class='space-y-6'>
            <div>
                <flux:heading size='lg'>TAMBAH TAMU UNDANGAN</flux:heading>
                <flux:text class='mt-2'>silahkan lengkapi form dibawah ini.</flux:text>
            </div>
    
            <flux:input 
            label='Nama Tamu Undangan' 
            placeholder='masukan nama tamu undagan' 
            wire:model='namapenerima'
            :invalid="$errors->has('namapenerima')"/>

            <flux:field>
                <flux:label>Nomor Whatsapp</flux:label>
                <div class="grid grid-cols-[20%_78%] gap-2">
                    <flux:input type='number' wire:model='kodenegara' :invalid="$errors->has('kodenegara')" style="text-align: center;font-weight: bold;" readonly/>
                    <flux:input type='number' wire:model='whatsapppenerima' :invalid="$errors->has('whatsapppenerima')"/>
                </div>
            </flux:field>

            <flux:input 
            label='Email Tamu Undangan' 
            placeholder='masukan email tamu undagan' 
            wire:model='emailpenerima'
            :invalid="$errors->has('emailpenerima')"/> 
    
    
            <div class='flex'>
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant='filled'>Cancel</flux:button>
                </flux:modal.close>
    
                <flux:separator vertical class='mx-3'/>
    
                <flux:button type='submit' variant='primary'>Tambah Tamu Undangan</flux:button>
            </div>
        </form>
    </flux:modal>


    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <flux:modal.trigger name='tambah-tamu-undangan'>
            <flux:button as='button' variant='primary' color='blue' class="md:w-lg">Tambah Tamu Undangan</flux:button>
        </flux:modal.trigger>

        {{-- View --}}
        <form class='max-w-full'>
            <label for='search' class='block mb-2.5 text-sm font-medium text-heading sr-only '>Search</label>
            <div class='relative'>
                <div class='absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none'>
                    <svg class='w-4 h-4 text-body' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'><path stroke='currentColor' stroke-linecap='round' stroke-width='2' d='m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z'/></svg>
                </div>
                <input type='search' wire:model.live='search' id='search' class='block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body' placeholder='Search' required />
                <button type='button' class='absolute end-1.5 bottom-1.5 text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none'>Search</button>
            </div>
        </form>
    </div>




    <flux:table :paginate='$data'>
        <flux:table.columns >
            <flux:table.column width="5px">No</flux:table.column>
            <flux:table.column>Nama Tamu Undangan</flux:table.column>
            <flux:table.column>Action</flux:table.column>
        </flux:table.columns>
    
        <flux:table.rows>
            @foreach ($data as $item)
                <flux:table.row>
                    <flux:table.cell>{{ $loop->iteration + $data->firstItem() - 1 }}</flux:table.cell>
                    <flux:table.cell>{{ $item->namapenerima }}</flux:table.cell>
                    <flux:table.cell>
                        <div class="flex items-center gap-2">
                            @php
                                // Menggunakan %0A untuk baris baru agar rapi saat dibaca
                                $urlUndangan = asset("share/{$undangan->kode}/{$item->kodepenerima}")."?v=1";

                                // Format Tanggal agar lebih cantik (Contoh: Minggu, 20 Oktober 2024)
                                $tanggalFormat = \Carbon\Carbon::parse($undangan->tanggal)->translatedFormat('l, d F Y');

                                $pesanTeks = "Assalamu’alaikum Warahmatullahi Wabarakatuh [br][br]"
                                . "“Bukan tentang menemukan yang sempurna, tapi tentang menerima dalam ketidaksempurnaan.”🕊️🕊️ [br][br]"
                                . "Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara pernikahan putra - putri kami: [br][br]"
                                . "✨ {$undangan->identitaspengantin->namapengantinpria} & {$undangan->identitaspengantin->namapengantinwanita} ✨ [br][br]"
                                . "Yang insyaAllah akan dilaksanakan pada: [br]"
                                . "📅 {$tanggalFormat} [br]"
                                . "📍 {$undangan->lokasi->namalokasi} ({$undangan->lokasi->alamat}) [br][br]"
                                . "Untuk informasi lengkap mengenai waktu dan lokasi, silakan mengakses undangan digital kami melalui tautan berikut: [br]"
                                . "🔗 {$urlUndangan} [br][br]"
                                . "Merupakan suatu kebahagiaan dan kehormatan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir serta memberikan doa restu. [br][br]"
                                . "Atas kehadiran dan doa restunya, kami ucapkan terima kasih. [br][br]"
                                . "Wassalamu’alaikum Warahmatullahi Wabarakatuh";

                                // dd($pesanTeks);

                                // Ubah [br] menjadi baris baru yang asli (\n harus dalam kutip dua)
                                $pesanTeks = str_replace('[br]', "\n", $pesanTeks);

                                // Encode pesan agar aman dikirim lewat URL
                                $urlWa = "https://wa.me/{$item->whatsapppenerima}?text=" . urlencode($pesanTeks);
                            @endphp

                            <flux:button 
                                as="a" 
                                href="{{ $urlWa }}" 
                                target="_blank" 
                                variant="primary" 
                                color="green" 
                                icon="envelope"
                                x-on:click="Flux.toast('Membuka WhatsApp...')">
                                WhatsApp
                            </flux:button>

                            <flux:button 
                                variant="primary" 
                                color="green" 
                                icon="clipboard-document"
                                wire:click="copyPesan({{ $item->idsebarundangan }})">
                                Kirim ke WhatsApp
                            </flux:button>
                            <flux:button variant="primary" color="danger" wire:click='hapusTamuUndangan({{ $item->idsebarundangan }})'>Hapus</flux:button>
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
    
    <script>
        window.addEventListener('copy-text', event => {
            navigator.clipboard.writeText(event.detail.text);
        });
    </script>

</div>
