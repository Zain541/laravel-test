<div>
    <div class="container w-9/12 m-auto p-12">
        <div class="grid grid-cols-2 gap-2 py-4">
            <label for="first_name">First name</label>
            <input type="text" wire:model="inputs.first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" />
            <div></div>
            @error('inputs.first_name') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-2  py-4">
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" wire:model="inputs.last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name" />
            <div></div>
            @error('inputs.last_name') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-2  py-4">
            <label for="address">Address</label>
            <textarea type="text" id="address" wire:model="inputs.address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address"></textarea>
            <div></div>
            @error('inputs.address') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-2  py-4">
            <label for="city">city</label>
            <input type="text" id="city" wire:model="inputs.city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="City" />
            <div></div>
            @error('inputs.city') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-2  py-4">
            <label for="country">country</label>
            <input type="text" id="country" wire:model="inputs.country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Country" />
            <div></div>
            @error('inputs.country') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-2  py-4">
            <label for="country">Date of Birth</label>

            <div class="grid grid-cols-3 gap-6">
                <div class="grid grid-cols-2">
                    <label for="month">Month</label>
                    <select type="text" wire:model.live="inputs.dob_month" id="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Month</option>
                            @foreach($months as $key => $month)
                                <option value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>

                        <div></div>
                        @error('inputs.dob_month') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-1">
                    <label for="day">Day</label>
                    <select type="text" id="day" wire:model="inputs.dob_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Day</option>
                            @if($inputs['dob_month'] !== null && $inputs['dob_month'] !== '')
                                @for($i = 1; $i <= $monthDays[$inputs['dob_month']]; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor           
                            @endif
                    </select>
                    <div></div>
                    @error('inputs.dob_day') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-1">
                    <label for="month">Year</label>
                    <select type="text" id="year" wire:model="inputs.dob_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Year</option>
                        @for ($i=2024; $i >= 1900; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <div></div>
                    @error('inputs.dob_year') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div>

            </div>
        </div>

        <div class="flex flex-row-reverse">
            <button class="bg-gray-300 p-2" wire:click="submitPage1">
                Next
            </button>
        </div>
    </div>
</div>
