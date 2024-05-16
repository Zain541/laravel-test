<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Page2 extends Component
{
    public array $monthDays = [];

    public array $months = [];

    public array $inputs = [];

    public string $dob = '';

    public bool $marriageAgeError = false;

    protected $rules = [
        'inputs.are_you_married' => 'required',
        'inputs.dom_month' => 'required_if:inputs.are_you_married,yes',
        'inputs.dom_day' => 'required_if:inputs.are_you_married,yes',
        'inputs.dom_year' => 'required_if:inputs.are_you_married,yes',
        'inputs.country_of_marriage' => 'required_if:inputs.are_you_married,yes',
        'inputs.are_you_widowed' => 'required_if:inputs.are_you_married,no',
        'inputs.have_you_ever_been_married' => 'required_if:inputs.are_you_married,no',
    ];

    protected $messages = [
        'inputs.are_you_married.required' => 'This Field is required.',
        'inputs.country_of_marriage.required_if' => 'This Country of Marriage id required.',
        'inputs.dom_month.required_if' => 'The Month is required.',
        'inputs.dom_day.required_if' => 'The Day is required.',
        'inputs.dom_year.required_if' => 'The Year is required.',
        'inputs.are_you_widowed.required_if' => 'This Field is required.',
        'inputs.have_you_ever_been_married.required_if' => 'This Field is required.',

        // dom means here date of marriege
    ];

    public function mount(): void
    {
        $this->inputs = [
            'are_you_married' => '',
            'dom_month' => '',
        ];
    }

    public function goToPage1(): void
    {
        $this->dispatch('go-to-page1');
    }

    public function submit(): bool
    {
        $this->validate();
        $dob = Carbon::createFromFormat('Y-m-d', $this->dob);
        if ($this->inputs['are_you_married'] === 'yes') {
            $domUnformatted = $this->inputs['dom_year'].'-'.$this->inputs['dom_month'].'-'.$this->inputs['dom_day'];
            $dom = Carbon::createFromFormat('Y-m-d', $domUnformatted);
            $ageWhenGetMarried = $dob->diffInYears($dom);
            if ($ageWhenGetMarried < 18) {
                $this->marriageAgeError = true;

                return false;
            }
            $this->inputs['dom'] = $dom;
            $this->marriageAgeError = false;
        }

        $this->dispatch('page-2-inputs', page2Inputs: $this->inputs);

        return true;
    }

    public function render()
    {
        return view('livewire.page2');
    }
}
