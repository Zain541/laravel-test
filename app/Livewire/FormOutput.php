<?php

namespace App\Livewire;

use Livewire\Component;

class FormOutput extends Component
{
    public array $formOutput;

    public function render()
    {
        return view('livewire.form-output');
    }
}
