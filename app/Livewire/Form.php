<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{
    public array $page1Inputs = [];

    public array $page2Inputs = [];

    public array $formOutput = [];

    public int $page = 1;

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
            12 => 'December',
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
            12 => 31,
        ];
    }

    #[On('page-1-inputs')]
    public function page1Inputs(array $page1Inputs): void
    {
        $this->page1Inputs = $page1Inputs;
        $this->switchPages(2);
    }

    #[On('page-2-inputs')]
    public function page2Inputs(array $page2Inputs): void
    {
        $this->page2Inputs = $page2Inputs;
        $this->formOutput = array_merge($this->page1Inputs, $this->page2Inputs);
        $this->switchPages(3);
    }

    #[On('go-to-page1')]
    public function goToPage1(): void
    {
        $this->switchPages(1);
    }

    public function switchPages(int $page): void
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.form');
    }
}
