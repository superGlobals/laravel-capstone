<?php

namespace App\Livewire\Admin\Subject;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SubjectIndex extends Component
{
    #[Layout('layouts.app')]
    #[Title('Subject')]
    public function render()
    {
        return view('livewire.admin.subject.subject-index');
    }
}
