<div>
    <div class="container w-9/12 m-auto p-12">
        <div class="grid grid-cols-2 gap-2 py-4">
        <label for="are_you_married">Are you Married?</label>
            <select type="text" wire:model.live="inputs.are_you_married" id="are_you_married" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Select</option>
                <option value="yes">Yes</option>                    
                <option value="no">No</option>                    
            </select>
            <div></div>
            @error('inputs.are_you_married') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>


        @if($inputs['are_you_married'] === 'yes')
            <div class="grid grid-cols-2 gap-2  py-4">
                <label for="country">Date of Marriage</label>

                <div class="grid grid-cols-3 gap-6">
                    <div class="grid grid-cols-2">
                        <label for="month">Month</label>
                        <select type="text" wire:model.live="inputs.dom_month" id="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Month</option>
                                @foreach($months as $key => $month)
                                <option value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>

                        <div></div>
                        @error('inputs.dom_month') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-1">
                        <label for="day">Day</label>
                        <select type="text" id="day" wire:model="inputs.dom_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Day</option>
                                @if($inputs['dom_month'] !== null && $inputs['dom_month'] !== '')
                                    @for($i = 1; $i <= $monthDays[$inputs['dom_month']]; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor           
                                @endif
                        </select>
                        <div></div>
                        @error('inputs.dom_day') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-1">
                        <label for="month">Year</label>
                        <select type="text" id="year" wire:model="inputs.dom_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Year</option>
                            @for ($i=2024; $i >= 1900; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <div></div>
                        @error('inputs.dom_year') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>

            <div class="grid grid-cols-2 gap-2  py-4">
            <label for="country_of_marriage">Country of Marriage</label>
            <input type="text" id="country_of_marriage" wire:model="inputs.country_of_marriage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Country of Marriage" />
            <div></div>
            @error('inputs.country_of_marriage') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>
        @elseif($inputs['are_you_married'] === 'no')
            <div class="grid grid-cols-2 gap-2 py-4">
            <label for="are_you_widowed">Are you widowed?</label>
                <select type="text" wire:model="inputs.are_you_widowed" id="are_you_widowed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>                    
                    <option value="no">No</option>                    
                </select>
                <div></div>
                @error('inputs.are_you_widowed') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-2 py-4">
            <label for="have_you_ever_been_married">Have you ever been married in the past?</label>
                <select type="text" wire:model="inputs.have_you_ever_been_married" id="have_you_ever_been_married" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>                    
                    <option value="no">No</option>                    
                </select>
                <div></div>
                @error('inputs.have_you_ever_been_married') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
        @endif

        @if($marriageAgeError === true)
            <div class="py-12"><span class="error text-red-600">You are not eligible to apply because your marriage occurred before your 18th birthday.</span></div>
        @endif

        <div class="flex justify-between">
            <button class="bg-gray-300 p-2" wire:click="goToPage1">
                Previous
            </button>
            <button class="bg-gray-300 p-2" wire:click="submit">
                Submit
            </button>
        </div>
    </div>
</div>
