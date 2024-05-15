<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class Form extends Component
{
    public array $page1Inputs = [];
    public bool $showPage1 = true;
    public bool $showPage2 = false;

    public array $months;
    public array $monthDays;

    public function mount(): void
    {
        $this->months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $this->monthDays = [
            1 => 31,
            2 => 28,
            3 => 31,
            4 => 30,
            5 => 31,
            6 => 30,
            7 => 31,
            8 => 31,
            9 => 30,
            10 => 31,
            11 => 30,
            12 => 31
        ];
    }

    #[On('page-1-inputs')] 
    public function page1Inputs(array $page1Inputs): void
    {
        $this->page1Inputs = $page1Inputs;
        $this->showPage1 = false;
        $this->showPage2 = true;
    }

    
    #[On('go-to-page1')] 
    public function goToPage1(): void
    {
        $this->showPage1 = true;
        $this->showPage2 = false;
        logger($this->page1Inputs);
    }
    public function render()
    {
        return view('livewire.form');
    }
}
