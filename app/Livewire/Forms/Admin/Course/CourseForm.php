<?php

namespace App\Livewire\Forms\Admin\Course;

use Livewire\Form;
use App\Models\Course;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Locked;

class CourseForm extends Form
{
    public ?Course $course;

    public $search = '';

    #[Locked]
    public $id;

    #[Rule('required|min:2')]
    public $name;

    #[Rule('required')]
    public $year;



    public function setCourse(Course $course)
    {
        $this->course = $course;

        $this->id = $course->id;
        $this->name = $course->name;
        $this->year = $course->year;
    }

    public function store()
    {
        Course::create($this->except(['course']));

        $this->reset();
    }

    public function update()
    {
        $this->course->update($this->except(['course']));
    }
}
