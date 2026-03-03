<x-layouts.app :title="__('UNDANGAN')">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div>
            <h1 class="mb-2 text-4xl font-bold text-heading md:text-4xl">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">{{ __("UNDANGAN DIGITAL") }}</span>
            </h1>
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ url('/dashboard', []) }}" icon="home">Home</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Undangan</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        
    </div>

    
    <flux:separator variant="subtle" class="my-4"/>
    
    <livewire:undangan-live />
    
    
</x-layouts.app>
