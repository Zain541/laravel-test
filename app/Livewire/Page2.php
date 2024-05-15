<?php

namespace App\Livewire;

use Livewire\Component;
use SebastianBergmann\Type\VoidType;

class Page2 extends Component
{

    public array $monthDays = [];
    public array $months = [];

    public array $inputs = [];

    protected $rules = [
        'inputs.are_you_married' => 'required',
    ];

    protected $messages = [
        'inputs.are_you_married.required' => 'This Field is required.',
        'inputs.last_name.required' => 'The Last Name is required.',
        'inputs.address.required' => 'The Address is required.',
        'inputs.city.required' => 'The City is required.',
        'inputs.country.required' => 'The Country is required.',
        'inputs.dob_month.required' => 'The Month is required.',
        'inputs.dob_day.required' => 'The Day is required.',
        'inputs.dob_year.required' => 'The Year is required.',
    ];


    public function mount(): void
    {
        $this->inputs = [
            'are_you_married' => '',
        ];
    }

    public function goToPage1(): void
    {
        $this->dispatch('go-to-page1');
    }

    public function render()
    {
        return view('livewire.page2');
    }
}
