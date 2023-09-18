<?php

namespace App\Livewire\Teacher\Dashboard;

use App\Models\TeacherClass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

class TeacherDashboard extends Component
{
    #[Layout('layouts.app')]
    #[On('dispatch-teacherClass-save')]
    public function render()
    {
        $teacherClass = TeacherClass::with('teacher', 'course', 'subject')
            ->where('user_id', Auth::id())
            ->get();
        return view('livewire.teacher.dashboard.teacher-dashboard', [
            'data' => $teacherClass
        ]);
    }
}
