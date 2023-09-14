<?php

namespace App\Livewire\Admin\Course;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Layout('layouts.app')]
    #[Title('Course')]
    public function render()
    {
        return view('livewire.admin.course.index');
    }
}
