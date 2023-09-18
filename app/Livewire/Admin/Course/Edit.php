<?php

namespace App\Livewire\Admin\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use App\Livewire\Forms\Admin\Course\CourseForm;

class Edit extends Component
{
    public CourseForm $form;

    public $editCourseModal = false;

    #[On('dispatch-course-edit')]
    public function showEditCourseModal(Course $id)
    {
        $this->form->setCourse($id);

        $this->editCourseModal = true;
    }

    public function edit()
    {
        $this->validate();

        try {
            if (Course::checkIfCourseExists($this->form->name, $this->form->year, $this->form->id)) {
                return $this->dispatch('notify', title: 'error', message: 'Course alreary added.');
            }

            $this->form->update();

            $this->dispatch('notify', title: 'success', message: 'Course updated successfully.');

            $this->editCourseModal = false;

            $this->dispatch('dispatch-course-edit')->to(Table::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('notify', title: 'error', message: 'An error occurred.');
        }
    }

    public function render()
    {
        return view('livewire.admin.course.edit');
    }
}
