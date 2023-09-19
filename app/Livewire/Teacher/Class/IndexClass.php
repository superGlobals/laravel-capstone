<?php

namespace App\Livewire\Teacher\Class;

use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexClass extends Component
{

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.teacher.class.index-class');
    }
}
