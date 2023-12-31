<?php

namespace App\Livewire\Admin\Course;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Livewire\Forms\Admin\Course\CourseForm;

class Create extends Component
{
    public CourseForm $form;

    public $createCourseModal = false;

    public function save()
    {
        $this->validate();

        try {
            if (Course::checkIfCourseExists($this->form->name, $this->form->year)) {
                return $this->dispatch('notify', title: 'error', message: 'Course alreary added.');
            }

            $this->form->store();

            $this->dispatch('notify', title: 'success', message: 'Course created successfully.');

            $this->createCourseModal = false;

            $this->dispatch('dispatch-course-save')->to(Table::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('notify', title: 'error', message: 'An error occurred.');
        }
    }

    public function render()
    {
        return view('livewire.admin.course.create');
    }
}
