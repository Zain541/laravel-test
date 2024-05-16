<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Page1 extends Component
{
    public array $monthDays = [];

    public array $months = [];

    public array $inputs = [];

    protected $rules = [
        'inputs.first_name' => 'required',
        'inputs.last_name' => 'required',
        'inputs.address' => 'required',
        'inputs.city' => 'required',
        'inputs.country' => 'required',
        'inputs.dob_month' => 'required',
        'inputs.dob_day' => 'required',
        'inputs.dob_year' => 'required',
    ];

    protected $messages = [
        'inputs.first_name.required' => 'The First Name is required.',
        'inputs.last_name.required' => 'The Last Name is required.',
        'inputs.address.required' => 'The Address is required.',
        'inputs.city.required' => 'The City is required.',
        'inputs.country.required' => 'The Country is required.',
        'inputs.dob_month.required' => 'The Month is required.',
        'inputs.dob_day.required' => 'The Day is required.',
        'inputs.dob_year.required' => 'The Year is required.',
    ];

    public function mount($months, $monthDays, $inputs): void
    {

        $this->months = $months;
        $this->monthDays = $monthDays;
        $this->inputs = $inputs;
        if (array_key_exists('dob', $inputs) === false) {// it means that the user has not submitted form in page 1 yet
            $this->inputs = [
                    'dob_month' => '',
                ];
        }

    }

    public function submitPage1(): void
    {
        $this->validate();
        $dobUnformatted = $this->inputs['dob_year'].'-'.$this->inputs['dob_month'].'-'.$this->inputs['dob_day'];
        $dob = Carbon::createFromFormat('Y-m-d', $dobUnformatted)->format('Y-m-d');
        $this->inputs['dob'] = $dob;
        $this->dispatch('page-1-inputs', page1Inputs: $this->inputs);
    }

    public function render()
    {
        return view('livewire.page1');
    }
}
