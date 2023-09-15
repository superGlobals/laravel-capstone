<?php

namespace App\Livewire\Admin\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\Admin\Course\CourseForm;

class Table extends Component
{
    use WithPagination;

    public CourseForm $form;

    public $paginate = 5;

    #[On('dispatch-course-save')]
    #[On('dispatch-course-edit')]
    #[On('dispatch-course-delete')]
    public function render()
    {
        return view('livewire.admin.course.table', [
            'courses' => Course::search($this->form->search)
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate)
        ]);
    }
}
