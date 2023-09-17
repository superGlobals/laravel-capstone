<?php

namespace App\Livewire\Teacher\Class;

use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;

class CreateClass extends Component
{
    public $course_id;

    public $subject_id;

    public $subjects = [];

    public $createTeacherClassModal = false;


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

    public function updatedCourseId($value)
    {
        $this->subjects = Subject::where('course_id', $value)->get();
    }
}
