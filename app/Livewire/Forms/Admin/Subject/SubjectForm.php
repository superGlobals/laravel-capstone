<?php

namespace App\Livewire\Forms\Admin\Subject;

use App\Models\Subject;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Form;

class SubjectForm extends Form
{
    public ?Subject $subject;

    public $search = '';

    #[Locked]
    public $id;

    #[Rule('required', as: 'course')]
    public $course_id;

    #[Rule('required', Rule::unique('subjects')->ignore($this->id), 'min:3', as: 'subject code')]
    public $subject_code;

    #[Rule('required|min:3', as: 'subject title')]
    public $subject_title;

    public $number_of_units;

    public function setSubject(Subject $subject)
    {
        $this->subject = $subject;

        $this->id = $subject->id;
        $this->course_id = $subject->course_id;
        $this->subject_code = $subject->subject_code;
        $this->subject_title = $subject->subject_title;
        $this->number_of_units = $subject->number_of_units;
    }

    public function store()
    {
        Subject::create($this->except(['subject']));

        $this->reset();
    }

    public function update()
    {
        $this->subject->update($this->except(['subject']));
    }
}
