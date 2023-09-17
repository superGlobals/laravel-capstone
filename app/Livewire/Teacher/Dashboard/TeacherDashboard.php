<?php

namespace App\Livewire\Teacher\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

class TeacherDashboard extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.teacher.dashboard.teacher-dashboard');
    }
}
