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
        'inputs.dom_month' => 'nullable|required',
        'inputs.dom_day' => 'nullable|required',
        'inputs.dom_year' => 'nullable|required',
    ];

    protected $messages = [
        'inputs.are_you_married.required' => 'This Field is required.',
        'inputs.country_of_marriage.required' => 'This Country of Marriage id required.',
        'inputs.dom_month.required' => 'The Month is required.',
        'inputs.dom_day.required' => 'The Day is required.',
        'inputs.dom_year.required' => 'The Year is required.',

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

    public function submit(): void
    {
        $this->validate();
        logger('form is submitted');
    }

    public function render()
    {
        return view('livewire.page2');
    }
}
