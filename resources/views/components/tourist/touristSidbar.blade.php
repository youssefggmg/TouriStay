<div class="w-full lg:w-64 mb-6 lg:mb-0 lg:mr-8">
    <div class="bg-white rounded-xl shadow-md p-5 sticky top-24">
        <h3 class="font-semibold text-lg mb-4 text-gray-800">Filters</h3>

        <!-- Price Range -->
        <div class="mb-5">
            <h4 class="font-medium text-gray-700 mb-2">Price Range</h4>
            <div class="flex items-center space-x-2">
                <input type="range" min="0" max="1000" value="500" class="w-full accent-rose-500">
            </div>
            <div class="flex justify-between text-sm text-gray-600 mt-1">
                <span>$0</span>
                <span>$1000+</span>
            </div>
        </div>

        <!-- Property Type -->
        <div class="mb-5">
            <h4 class="font-medium text-gray-700 mb-2">Property Type</h4>
            <div class="space-y-1">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-500 mr-2">
                    House
                </label>
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-500 mr-2">
                    Apartment
                </label>
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-500 mr-2">
                    Cabin
                </label>
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-500 mr-2">
                    Villa
                </label>
            </div>
        </div>

        <!-- Amenities -->
        <div class="mb-5">
            <h4 class="font-medium text-gray-700 mb-2">Amenities</h4>
            <div class="space-y-1">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-500 mr-2">
                    Pool
                </label>
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-500 mr-2">
                    Wi-Fi
                </label>
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-500 mr-2">
                    Kitchen
                </label>
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="h-4 w-4 text-rose-500 focus:ring-rose-500 mr-2">
                    Air conditioning
                </label>
            </div>
        </div>

        <!-- Cards Per Page -->
        <div class="mb-3">
            <h4 class="font-medium text-gray-700 mb-2">Cards Per Page</h4>
            <select
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-500 focus:ring-opacity-50 text-gray-700 py-2 px-3 bg-white">
                <option value="6">6 cards</option>
                <option value="12">12 cards</option>
                <option value="24">24 cards</option>
                <option value="48">48 cards</option>
            </select>
        </div>

        <button class="w-full mt-4 py-2 px-4 bg-rose-500 hover:bg-rose-600 text-white font-medium rounded-lg">
            Apply Filters
        </button>
    </div>
</div>