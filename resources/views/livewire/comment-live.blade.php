<div>
    <flux:input icon="magnifying-glass" placeholder="Search orders" class="w-md ml-auto" wire:model.live="search"/>

    <flux:table :paginate="$komentar">
        <flux:table.columns>
            <flux:table.column width="5px">No</flux:table.column>
            <flux:table.column width="15px">Nama Komentar</flux:table.column>
            <flux:table.column>Pesan</flux:table.column>
            <flux:table.column>Status</flux:table.column>
            <flux:table.column>Action</flux:table.column>
        </flux:table.columns>
    
        @foreach ($komentar as $item)
            <flux:table.rows wire:key="komentar-{{ $item->idkomentar }}">
                <flux:table.cell>{{ $loop->iteration + $komentar->firstItem() - 1  }}</flux:table.cell>
                <flux:table.cell>{{ $item->namakomentar }}</flux:table.cell>
                <flux:table.cell class="whitespace-normal">{{ $item->komentar }} </flux:table.cell>
                <flux:table.cell>
                    @if ($item->tampilkan == 0)
                        <flux:badge color="red" variant="pill">Ditunda</flux:badge>
                    @elseif($item->tampilkan == 1)
                        <flux:badge color="green" variant="pill">Tampil</flux:badge>
                    @endif
                </flux:table.cell>
                <flux:table.cell>
                    @if ($item->tampilkan == 0)
                    <flux:checkbox wire:change="tampil({{ $item->idkomentar }})" />
                        
                    @elseif($item->tampilkan == 1)
                    <flux:checkbox checked wire:change="tampil({{ $item->idkomentar }})" />
                    @endif
                </flux:table.cell>
            </flux:table.rows>
        @endforeach
    </flux:table>
</div>
