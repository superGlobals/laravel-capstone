<?php

namespace App\Livewire\Forms\Admin\Subject;

use App\Models\Subject;
use Livewire\Attributes\Locked;
use Illuminate\Validation\Rule;
use Livewire\Form;

class SubjectForm extends Form
{
    public ?Subject $subject;

    public $search = '';

    #[Locked]
    public $id;

    public $course_id;

    public $subject_code;

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

    public function rules()
    {
        return [
            'course_id' => 'required',
            'subject_code' => 'required', Rule::unique('subjects')->ignore($this->id),
            'subject_title' => 'required',
            'number_of_units' => 'nullable'
        ];
    }
}
