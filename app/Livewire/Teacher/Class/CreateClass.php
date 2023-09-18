<?php

namespace App\Livewire\Teacher\Class;

use App\Livewire\Teacher\Dashboard\TeacherDashboard;
use App\Models\Course;
use App\Models\Subject;
use App\Models\TeacherClass;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CreateClass extends Component
{
    public $teacherId;

    #[Rule('required', as: 'class name')]
    public $course_id;

    #[Rule('required', as: 'subject')]
    public $subject_id;

    public $subjects = [];

    public $createTeacherClassModal = false;

    public function mount()
    {
        $this->teacherId = Auth::id();
    }

    public function render()
    {
        return view('livewire.teacher.class.create-class', [
            'courses' => Course::select('id', 'name', 'year', 'section')
                ->whereIn('id', function ($query) {
                    $query->selectRaw('MIN(id)')
                        ->from('courses')
                        ->groupBy('name', 'year', 'section');
                })
                ->orderBy('name')
                ->orderBy('year')
                ->get()
        ]);
    }

    public function saveTeacherClass()
    {
        $this->validate();

        try {
            TeacherClass::create([
                'user_id' => $this->teacherId,
                'course_id' => $this->course_id,
                'subject_id' => $this->subject_id
            ]);

            $this->dispatch('notify', title: 'success', message: 'Subject created successfully.');

            $this->createTeacherClassModal = false;

            $this->dispatch('dispatch-teacherClass-save')->to(TeacherDashboard::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('notify', title: 'error', message: 'An error occurred.');
        }
    }

    public function updatedCourseId($value)
    {
        $this->subjects = Subject::where('course_id', $value)->get();
    }
}
