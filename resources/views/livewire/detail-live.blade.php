<div>
    <flux:tab.group>

        <div class="w-full overflow-x-auto bg-zinc-50 dark:bg-zinc-900 rounded-lg">
            <flux:tabs 
                scrollable 
                scrollable:fade 
                class="w-max min-w-full px-4 "
            >
                <flux:tab name="home" icon="home"> Halaman Utama</flux:tab>
                <flux:tab name="agenda" icon="calendar">Agenda</flux:tab>
                <flux:tab name="pasfoto" icon="user-circle">Pasfoto</flux:tab>
                <flux:tab name="gallery" icon="photo">Gallery</flux:tab>
                <flux:tab name="orangtua" icon="users">Orang Tua</flux:tab>
                <flux:tab name="rekening" icon="credit-card">Rekening</flux:tab>
                <flux:tab name="lokasi2" icon="map-pin">Lokasi</flux:tab>
            </flux:tabs>
        </div>


        <flux:tab.panel class="-mt-2 p-5" name="agenda" >
            <div class="grid grid-cols-2 gap-8">
                <flux:kanban.card class="p-5">
                    <form wire:submit="agenda('akad')" class="space-y-5">

                        <flux:heading size="xl" level="2">Akad Nikah</flux:heading>
                        <flux:menu.separator/>
    
    
                        <flux:input 
                        label='jam akad' 
                        placeholder='Masukan jam akad' 
                        wire:model='jamakad'
                        type="time"
                        :invalid="$errors->has('jamakad')"/>

                        <flux:button type="submit" variant="primary" color="blue" class="w-full">UPDATE</flux:button>
                    </form>
                </flux:kanban.card>
                
                <flux:kanban.card>
                    <form wire:submit="agenda('resepsi')" class="space-y-5">
                        <flux:heading size="xl" level="2">Resepsi Nikah</flux:heading>
                        <flux:menu.separator/>
                        
    
                        <flux:input 
                        label='Jam Resepsi' 
                        placeholder='Masukan Jam Resepsi' 
                        wire:model='jamresepsi'
                        type="time"
                        :invalid="$errors->has('jamresepsi')"/>

                        <flux:button type="submit" variant="primary" color="blue" class="w-full">UPDATE</flux:button>
                    </form>

                </flux:kanban.card>
            </div>
        </flux:tab.panel>


        <flux:tab.panel class="-mt-2 p-5" name="pasfoto" >
             <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
               <flux:kanban.card>
                <flux:heading size="xl" level="1" class="mb-3">Pasfoto, Pria</flux:heading>

                <img 
                src="{{ Storage::url($fotol) }}" 
                alt="Contoh Gambar Pasfoto"
                loading="lazy"
                class="
                    w-[200px] 
                    h-[200px] 
                    rounded-full 
                    object-cover 
                    object-center
                    shadow-2xl
                    mx-auto
                    border-8
                    border-white
                "
                />

                <form wire:submit="updatepasfotol">
                    <flux:file-upload wire:model="pasfotol" label="Upload file">
                        <flux:file-upload.dropzone heading="Drop file here or click to browse" text="JPG, PNG, GIF up to 10MB" />
                    </flux:file-upload>

                    <div class="mt-3 flex flex-col gap-2">
                        @if ($pasfotol)
                            <flux:file-item
                                :heading="$pasfotol->getClientOriginalName()"
                                :image="$pasfotol->temporaryUrl()"
                                :size="$pasfotol->getSize()"
                            >
                                <x-slot name="actions">
                                    <flux:file-item.remove wire:click="removePhotol" aria-label="{{ 'Remove file: ' . $pasfotol->getClientOriginalName() }}" />
                                </x-slot>
                            </flux:file-item>
                        @endif
                    </div>

                    <flux:button type="submit" variant="primary" color="blue" class="w-full">UPDATE</flux:button>
                </form>

               </flux:kanban.card>
               <flux:kanban.card>
                <flux:heading size="xl" level="1" class="mb-3">Pasfoto, Wanita</flux:heading>

                <img 
                src="{{ Storage::url($fotop) }}" 
                alt="Contoh Gambar Pasfoto"
                loading="lazy"
                class="
                    w-[200px] 
                    h-[200px] 
                    rounded-full 
                    object-cover 
                    object-center
                    shadow-2xl
                    mx-auto
                    border-8
                    border-white
                "
                />

                <form wire:submit="updatepasfotop">
                    <flux:file-upload wire:model="pasfotop" label="Upload file">
                        <flux:file-upload.dropzone heading="Drop file here or click to browse" text="JPG, PNG, GIF up to 10MB" />
                    </flux:file-upload>

                    <div class="mt-3 flex flex-col gap-2">
                        @if ($pasfotop)
                            <flux:file-item
                                :heading="$pasfotop->getClientOriginalName()"
                                :image="$pasfotop->temporaryUrl()"
                                :size="$pasfotop->getSize()"
                            >
                                <x-slot name="actions">
                                    <flux:file-item.remove wire:click="removePhotop" aria-label="{{ 'Remove file: ' . $pasfotop->getClientOriginalName() }}" />
                                </x-slot>
                            </flux:file-item>
                        @endif
                    </div>

                    <flux:button type="submit" variant="primary" color="blue" class="w-full">UPDATE</flux:button>
                </form>

               </flux:kanban.card>
                
            </div>
        </flux:tab.panel>



        <flux:tab.panel class="-mt-2 p-5" name="home" >
            
            <div class="grid grid-cols-1 md:grid-cols-[35%_65%] gap-5 item-start">
                <div class="grid grid-cols-1 gap-5">
                    <div class="max-h-[400px]
                            rounded-2xl
                            flex items-center justify-center 
                            overflow-hidden">

                        <img 
                            src="{{ empty($identitaspengantin->fotopengantin) ? url('not-available.jpg') : asset('storage/' . $identitaspengantin->fotopengantin) }}"
                            class="max-h-full w-auto object-contain transition duration-300 hover:scale-105 rounded-2xl"
                            loading="lazy"
                        >
                    </div>
                
                    <form wire:submit="save_image" class="space-y-3">
                        <flux:file-upload wire:model="photo" label="Upload file" >
                            <flux:file-upload.dropzone heading="Drop file here or click to browse" text="JPG, PNG, GIF up to 10MB" />
                        </flux:file-upload>

                        <div class="mt-3 flex flex-col gap-2">
                            @if ($photo)
                                <flux:file-item
                                    :heading="$photo->getClientOriginalName()"
                                    :image="$photo->temporaryUrl()"
                                    :size="$photo->getSize()"
                                >
                                    <x-slot name="actions">
                                        <flux:file-item.remove wire:click="removePhoto" aria-label="{{ 'Remove file: ' . $photo->getClientOriginalName() }}" />
                                    </x-slot>
                                </flux:file-item>
                            @endif
                        </div>

                        <flux:button type="submit" variant="primary" color="blue" class="w-full">UPDATE GAMBAR</flux:button>
                    </form>
                </div>

                <div class="space-y-5">
                    <flux:separator text="Pria"/>
                    <flux:input 
                    label='Nama Pria' 
                    placeholder='null' 
                    wire:model='namapengantinpria'
                    readonly variant="filled"
                    :invalid="$errors->has('namapengantinpria')"/>
                    <flux:input 
                    label='Nama Lengkap Pengantin Pria' 
                    placeholder='null' 
                    wire:model='namalengkappengantinpria'
                    readonly variant="filled"
                    :invalid="$errors->has('namalengkappengantinpria')"/>
                    <flux:input 
                    label='Status Pria' 
                    placeholder='null' 
                    wire:model='statusanakpria'
                    readonly variant="filled"
                    :invalid="$errors->has('statusanakpria')"/>

                    <flux:separator text="Wanita"/>
                    
                    <flux:input 
                    label='Nama Wanita' 
                    placeholder='null' 
                    wire:model='namapengantinwanita'
                    readonly variant="filled"
                    :invalid="$errors->has('namapengantinwanita')"/>
                    <flux:input 
                    label='Nama Lengkap Pengantin Wanita' 
                    placeholder='null' 
                    wire:model='namalengkappengantinwanita'
                    readonly variant="filled"
                    :invalid="$errors->has('namalengkappengantinwanita')"/>
                    <flux:input 
                    label='Status Wanita' 
                    placeholder='null' 
                    wire:model='statusanakwanita'
                    readonly variant="filled"
                    :invalid="$errors->has('statusanakwanita')"/>

                    <flux:separator text="Tanggal Pernikahan"/>
                    <flux:date-picker label="Tanggal Acara"
                    readonly variant="filled" disabled
                    wire:model='tanggal' :invalid="$errors->has('tanggal')" />
                </div>

                

                
            </div>
        
        
        
           

            


            
        </flux:tab.panel>






        <flux:tab.panel icon class="-mt-2" name="gallery">


            <div class="grid grid-cols-1 md:grid-cols-[30%_70%] gap-5 item-start">
                <div class="grid grid-cols-1 gap-5">
                            
                    <!-- Blade view: -->
                    <form wire:submit="save_images">
                        <flux:file-upload wire:model="photos" label="Upload files" multiple>
                            <flux:file-upload.dropzone heading="Drop files here or click to browse" text="JPG, PNG, GIF up to 10MB" />
                        </flux:file-upload>

                        <div class="mt-3 flex flex-col gap-2">
                            @foreach ($photos as $index => $photo)
                                <flux:file-item
                                    :heading="$photo->getClientOriginalName()"
                                    :image="$photo->temporaryUrl()"
                                    :size="$photo->getSize()"
                                >
                                    <x-slot name="actions">
                                        <flux:file-item.remove wire:click="removePhotos({{ $index }})" aria-label="{{ 'Remove file: ' . $photo->getClientOriginalName() }}" />
                                    </x-slot>
                                </flux:file-item>
                            @endforeach
                        </div>

                        <flux:button type="submit" variant="primary" color="blue" class="w-full">UPDATE GALLERY</flux:button>
                    </form>
                </div>

                <div class="space-y-5">
                    
                    <div class="flex justify-center md:mx-10">

                        <!-- MAX WIDTH -->
                        <div class="max-w-7xl w-full">

                            <!-- MASONRY -->
                            <div class="inline-block columns-2 md:columns-3 lg:columns-4 gap-4 md:gap-5 space-y-4 md:space-y-5">
                                @foreach ($gallery as $item)
                                    <div
                                        class="break-inside-avoid group relative
                                            rounded-[2rem] md:rounded-[1.75rem]
                                            border border-jawa-gold/20
                                            bg-white/5 backdrop-blur-sm
                                            overflow-hidden
                                            transition-all duration-700 ease-out
                                            hover:-translate-y-2
                                            hover:border-jawa-gold
                                            hover:shadow-[0_30px_60px_-15px_rgba(197,160,89,0.45)]
                                            active:scale-[0.97]
                                            animate-[fadeUp_0.9s_ease-out_both]"
                                    >
                                    
                                        <!-- IMAGE FRAME -->
                                        <div class="overflow-hidden rounded-[1.85rem] md:rounded-[1.6rem]">

                                            <img
                                                loading="lazy"
                                                src="{{ asset("storage/". $item->fotogallery) }}"
                                                class="w-full h-auto object-cover
                                                    scale-105
                                                    transition-all duration-700 ease-out
                                                    group-hover:scale-110
                                                    group-hover:rotate-[0.5deg]
                                                    group-hover:saturate-110"
                                                    
                                            />
                                            <flux:badge as='button' variant='primary' class="w-full" color='red' icon='trash' size='lg' wire:click="hapusgambar({{ $item->idgallery }})">Hapus</flux:badge>

                                        </div>

                                        <!-- OVERLAY -->
                                        <div
                                            class="pointer-events-none absolute inset-0
                                                rounded-[2rem] md:rounded-[1.75rem]
                                                bg-gradient-to-t
                                                from-black/60 via-black/20 to-transparent
                                                opacity-0
                                                group-hover:opacity-100
                                                transition duration-700">
                                                
                                        </div>

                                    </div>
                                    
                                @endforeach
                                

                            </div>

                        </div>
                    </div>

                </div>

                

                
            </div>

        </flux:tab.panel>
        
        
        
        
        <flux:tab.panel class="-mt-2" name="orangtua">

            
        
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <flux:kanban.card>
                    <flux:heading size="xl" level="1" class="mb-3">Orang Tua, Wanita</flux:heading>
                    <flux:modal.trigger name="orangtuaWanita" class="">
                        <flux:button type="submit" variant="primary" color="blue" class="mb-4">Lengkapi Data Orang Tua</flux:button>
                    </flux:modal.trigger>
                    
                    <flux:modal name="orangtuaWanita" class="md:w-lg">
                        
                        <form wire:submit="updateortup" class="space-y-6">
                            <div>
                                <flux:heading size="lg">Lengkapi Data Orang Tua, Wanita</flux:heading>
                                <flux:text class="mt-2">Silahkan lengkapi form dibawah ini.</flux:text>
                            </div>
                            
                            <flux:input 
                            label='Nama Bapak' 
                            placeholder='Masukan Nama Bapak' 
                            wire:model='namabapak'
                            type="text"
                            :invalid="$errors->has('namabapak')"/>

                            <flux:input 
                            label='Nama Ibu' 
                            placeholder='Masukan Nama Ibu' 
                            wire:model='namaibu'
                            type="text"
                            :invalid="$errors->has('namaibu')"/>
                    
                            <div class="flex">
                                <flux:spacer />
                    
                                <flux:button type="submit" variant="primary" color="blue" class="w-full">Tambah</flux:button>
                            </div>
                        </form>
                    </flux:modal>    


                    <flux:table >
                        <flux:table.columns>
                            <flux:table.column align="center">Nama Bapak</flux:table.column>
                            <flux:table.column align="center">Nama Ibu</flux:table.column>
                        </flux:table.columns>
                    
                        <flux:table.rows>
                            @foreach ($orangtuaP as $item)
                                <flux:table.cell align="center" width="50%" >{{ $item->namabapak }}</flux:table.cell>
                                <flux:table.cell align="center" width="50%">{{ $item->namaibu }}</flux:table.cell>
                            @endforeach
                        </flux:table.rows>
                    </flux:table>


                    
                </flux:kanban.card>
                    
                <flux:kanban.card>
                    <flux:heading size="xl" level="1" class="mb-3">Orang Tua, Pria</flux:heading>
                    <flux:modal.trigger name="orangtuaPria" class="">
                        <flux:button type="submit" variant="primary" color="blue" class="mb-4">Lengkapi Data Orang Tua</flux:button>
                    </flux:modal.trigger>
                    
                    <flux:modal name="orangtuaPria" class="md:w-lg">
                        
                        <form wire:submit="updateortul" class="space-y-6">
                            <div>
                                <flux:heading size="lg">Lengkapi Data Orang Tua Pria</flux:heading>
                                <flux:text class="mt-2">Silahkan lengkapi form dibawah ini.</flux:text>
                            </div>
                            
                            <flux:input 
                            label='Nama Bapak' 
                            placeholder='Masukan Nama Bapak' 
                            wire:model='namabapak'
                            type="text"
                            :invalid="$errors->has('namabapak')"/>

                            <flux:input 
                            label='Nama Ibu' 
                            placeholder='Masukan Nama Ibu' 
                            wire:model='namaibu'
                            type="text"
                            :invalid="$errors->has('namaibu')"/>
                    
                            <div class="flex">
                                <flux:spacer />
                    
                                <flux:button type="submit" variant="primary" color="blue" class="w-full">Tambah</flux:button>
                            </div>
                        </form>
                    </flux:modal>    


                    <flux:table >
                        <flux:table.columns>
                            <flux:table.column align="center">Nama Bapak</flux:table.column>
                            <flux:table.column align="center">Nama Ibu</flux:table.column>
                        </flux:table.columns>
                    
                        <flux:table.rows>
                            @foreach ($orangtuaL as $item)
                                <flux:table.cell align="center" width="50%" >{{ $item->namabapak }}</flux:table.cell>
                                <flux:table.cell align="center" width="50%">{{ $item->namaibu }}</flux:table.cell>
                            @endforeach
                        </flux:table.rows>
                    </flux:table>
                </flux:kanban.card>
                
            </div>
       

               

                

    
        </flux:tab.panel>
        
        
        
        <flux:tab.panel class="-mt-2" name="rekening">

            <div class="grid grid-cols-1 md:grid-cols-[35%_65%] gap-5 item-start">
                <div class="grid grid-cols-1 gap-5">
                    <form wire:submit="save_bank" class="space-y-3">

                        <flux:select variant="listbox" searchable placeholder="Pilih Bank..." label="Nama Bank" wire:model="namabank" :invalid="$errors->has('namabank')">
                            <flux:select.option>BCA</flux:select.option>
                            <flux:select.option>BRI</flux:select.option>
                            <flux:select.option>BNI</flux:select.option>
                            <flux:select.option>BSI</flux:select.option>
                        </flux:select>
                        
                        <flux:input 
                        label='Nomor Rekening' 
                        placeholder='masukan nomor rekening' 
                        wire:model='nomorrekening'
                        type="number"
                        :invalid="$errors->has('nomorrekening')"/>

                        <flux:input 
                        label='Atas Nama' 
                        placeholder='masukan atas nama rekening' 
                        wire:model='atasnama'
                        :invalid="$errors->has('atasnama')"/>

                        <flux:button type="submit" variant="primary" color="blue" class="w-full">TAMBAH BANK</flux:button>
                    </form>
                </div>

                    
                <div class="justify-center">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-5">

                        @foreach ($databank as $item)
                        <div class="w-full max-w-md
                                    rounded-3xl border border-jawa-gold/60
                                    bg-black/70 backdrop-blur-md p-5
                                    transition-all duration-500
                                    hover:border-jawa-gold
                                    hover:-translate-y-1
                                    hover:shadow-[0_20px_40px_-10px_rgba(197,160,89,0.4)]">

                            <!-- TOP -->
                            <div class="flex items-center gap-3 mx-0">

                                <!-- ICON -->
                                <div class="w-16 h-16 flex items-center justify-center
                                            rounded-2xl bg-white/10 shrink-0">
                                    <img loading="lazy" src="{{ $item->urlgambar }}"
                                        class="w-12" alt="{{ $item->namabank }}">
                                </div>

                                <!-- TEXT -->
                                <div>
                                    <p class="text-white font-semibold text-lg">{{ $item->namabank }}</p>
                                    <p class="text-jawa-beige text-lg font-mono tracking-wide">
                                        {{ $item->nomorrekening }}
                                    </p>
                                    <p class="text-jawa-beige/70 text-sm">
                                        {{ $item->atasnama }}
                                    </p>
                                </div>
                            </div>

                            <!-- BUTTON -->
                            <flux:button wire:click="hapusbank({{ $item->idrekening }})" variant="primary" color="red" class="mt-2 w-full rounded-3xl" icon="trash">Hapus</flux:button>
                        </div>
                            
                        @endforeach

                    </div>
                </div>
            </div>

        </flux:tab.panel>
        
        
        <flux:tab.panel class="-mt-2" name="lokasi2">

            <div class="grid grid-cols-1 md:grid-cols-[35%_65%] gap-5 item-start">
                <div class="space-y-5">
                    <flux:input 
                    label='Nama Lokasi' 
                    placeholder='masukan nama lokasi' 
                    wire:model='namalokasi'
                    :invalid="$errors->has('namalokasi')"/>

                   <flux:textarea rows="2" label="Alamat lengkap" wire:model='alamat' :invalid="$errors->has('alamat')"  placeholder="masukan alamat lokasi"/>

                    <div class="mt-4 grid grid-cols-2 gap-4">
                        <flux:input id="lat-input" label="Latitude" wire:model.live="latitude" />
                        <flux:input id="lng-input" label="Longitude" wire:model.live="longitude" />
                    </div>

                    <flux:button type="submit" variant="primary" color="blue" class="w-full mt-4" wire:click="save_lokasi">UPDATE LOKASI</flux:button>
                </div>

                <div>
                    <div class="">
                        <input 
                            type="text"
                            id="search-location"
                            placeholder="Cari lokasi..."
                            class="w-full border rounded-lg px-3 py-2"
                        />
                    </div>

                    <div wire:ignore>
                        <div id="map" class="w-full h-96 rounded-xl"></div>
                    </div>
                </div>
            </div>
            
            

            

        </flux:tab.panel>

    </flux:tab.group>


    

</div>

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet@3.0.8/dist/esri-leaflet.js"></script>
@endpush

@push('scripts')
<script>
document.addEventListener('livewire:navigated', function () {
    initMapWhenVisible();
});

function initMapWhenVisible() {

    const mapContainer = document.getElementById('map');
    if (!mapContainer) return;

    const observer = new MutationObserver(() => {

        if (mapContainer.offsetParent !== null) {

            if (!window.mapInstance) {
                initializeMap();
            }

            setTimeout(() => {
                window.mapInstance.invalidateSize();
            }, 300);

        }
    });

    observer.observe(document.body, {
        attributes: true,
        subtree: true
    });
}

function initializeMap() {

    const latDefault = parseFloat(@this.get('latitude')) || {{ $latitude }};
    const lngDefault = parseFloat(@this.get('longitude')) || {{ $longitude }};

    const street = L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        { attribution: '&copy; OpenStreetMap contributors' }
    );

    const satellite = L.esri.basemapLayer('Imagery');

    const map = L.map('map', {
        center: [latDefault, lngDefault],
        zoom: 13,
        layers: [street]
    });

    window.mapInstance = map;

    L.control.layers({
        "Street": street,
        "Satellite": satellite
    }).addTo(map);

    const marker = L.marker([latDefault, lngDefault], {
        draggable: true
    }).addTo(map);

    window.mapMarker = marker;

    // Klik peta
    map.on('click', function (e) {
        marker.setLatLng(e.latlng);
        updateLatLng(e.latlng.lat, e.latlng.lng);
    });

    // Drag marker
    marker.on('dragend', function () {
        const pos = marker.getLatLng();
        updateLatLng(pos.lat, pos.lng);
    });

    // SEARCH Nominatim
    document.getElementById('search-location')
        .addEventListener('change', function () {

        const query = this.value;

        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
            .then(res => res.json())
            .then(data => {

                if (data.length > 0) {

                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);

                    map.setView([lat, lon], 15);
                    marker.setLatLng([lat, lon]);

                    updateLatLng(lat, lon);
                }
            });
    });

    // Jika input manual diubah
    document.getElementById('lat-input')
        .addEventListener('change', moveMarkerFromInput);

    document.getElementById('lng-input')
        .addEventListener('change', moveMarkerFromInput);

}

function updateLatLng(lat, lng) {

    @this.set('latitude', lat);
    @this.set('longitude', lng);
}

function moveMarkerFromInput() {

    const lat = parseFloat(@this.get('latitude'));
    const lng = parseFloat(@this.get('longitude'));

    if (!isNaN(lat) && !isNaN(lng)) {

        window.mapMarker.setLatLng([lat, lng]);
        window.mapInstance.setView([lat, lng], 15);
    }
}
</script>
@endpush
