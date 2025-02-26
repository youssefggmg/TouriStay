<x-layout.tourist>
    <x-tourist.touristHeader></x-ltourist.touristHeader>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-row">
                {{-- sidebar --}}
                <x-tourist.touristSidebar></x-tourist.touristSidebar>
                {{-- mian content --}}
                <div class="flex-1">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 flex-nowrap">
                        <x-tourist.touristCard></x-tourist.tourist-card>
                    </div>
                    <x-tourist.touristBagination></x-tourist.touristBagination>
                </div>
            </div>
        </div>
</x-layout.tourist>