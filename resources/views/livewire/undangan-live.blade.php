<div>
    <flux:modal name='tambah-data-pengantin' class='md:w-md'>
        <form wire:submit.prevent='tambah' class='space-y-6'>
            <div>
                <flux:heading size='lg'>Form namaform</flux:heading>
                <flux:text class='mt-2'>silahkan lengkapi form dibawah ini.</flux:text>
            </div>
    
            <flux:date-picker 
            label='Tanggal Pernikahan'
            wire:model='tanggal' />

            <flux:separator text="Pria"/>

            <flux:input 
            label='Nama Lengkap Pengantin Pria' 
            placeholder='Masukan Nama pengantin pria' 
            wire:model='namalengkappengantinpria'
            :invalid="$errors->has('namalengkappengantinpria')"/>

            <flux:input 
            label='Nama Panggilan Pria' 
            placeholder='Masukan Nama Panggilan Pria' 
            wire:model='namapengantinpria'
            type="text"
            :invalid="$errors->has('namapengantinpria')"/>

            <flux:input 
            label='Status Anak Pengantin Pria' 
            placeholder='Contoh : pertama, kedua, sulung, bungsu dll.' 
            wire:model='statusanakpria'
            type="text"
            :invalid="$errors->has('statusanakpria')"/>
            
            <flux:separator text="Wanita"/>

            <flux:input 
            label='Nama Lengkap Pengantin Wanita' 
            placeholder='Masukan Nama pengantin wanita' 
            wire:model='namalengkappengantinwanita'
            :invalid="$errors->has('namalengkappengantinwanita')"/>

            <flux:input 
            label='Nama Panggilan Wanita' 
            placeholder='Masukan Nama Panggilan Wanita' 
            wire:model='namapengantinwanita'
            type="text"
            :invalid="$errors->has('namapengantinwanita')"/>

            <flux:input 
            label='Status Anak Pengantin Wanita' 
            placeholder='Contoh : pertama, kedua, sulung, bungsu dll.' 
            wire:model='statusanakwanita'
            type="text"
            :invalid="$errors->has('statusanakwanita')"/>
    
    
            <div class='flex'>
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant='filled'>Cancel</flux:button>
                </flux:modal.close>
    
                <flux:separator vertical class='mx-3'/>
    
                <flux:button type='submit' variant='primary'>Save changes</flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:modal.trigger name='tambah-data-pengantin'>
        <flux:button variant='primary' color='emerald' class="mb-5">Tambah data Pengantin</flux:button>
    </flux:modal.trigger>


        <form class='max-w-lg ms-auto mb-5'>
            <label for='search' class='block mb-2.5 text-sm font-medium text-heading sr-only '>Search</label>
            <div class='relative'>
                <div class='absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none'>
                    <svg class='w-4 h-4 text-body' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'><path stroke='currentColor' stroke-linecap='round' stroke-width='2' d='m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z'/></svg>
                </div>
                <input type='search' wire:model.live='search' id='search' class='block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body' placeholder='Search' required />
                <button type='button' class='absolute end-1.5 bottom-1.5 text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none'>Search</button>
            </div>
        </form>


    <flux:table :paginate='$data'>
        <flux:table.columns >
            <flux:table.column width="5px">No</flux:table.column>
            <flux:table.column>Tanggal</flux:table.column>
            <flux:table.column>Nama Pengantin</flux:table.column>
            <flux:table.column>action</flux:table.column>
        </flux:table.columns>
    
        <flux:table.rows>
            @foreach ($data as $item)
            <flux:table.row>
                <flux:table.cell>{{ $loop->iteration + $data->firstItem() - 1 }}</flux:table.cell>
                <flux:table.cell>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, DD MMMM YY') }}</flux:table.cell>
                <flux:table.cell ><b>{{ $item->identitaspengantin->namapengantinpria??"" }} & {{ $item->identitaspengantin->namapengantinwanita??"" }}</b></flux:table.cell>
                <flux:table.cell>
                    <flux:button variant='primary' color='blue' href="{{ route('detail-undangan', $item->idundangan) }}" icon="eye">Detail Undangan</flux:button>
                    <flux:button variant='primary' color='green' href="{{ route('sebar-undangan', $item->idundangan) }}" icon="envelope">Sebar Undangan</flux:button>
                </flux:table.cell>
            </flux:table.row>
                
            @endforeach
        </flux:table.rows>
    </flux:table>
    
</div>


