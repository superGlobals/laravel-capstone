<?php

namespace App\Livewire\Admin\Course;

use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;

class Delete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $deleteCourseModal = false;

    #[On('dispatch-course-delete')]
    public function showDeleteCourseModal($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->deleteCourseModal = true;
    }

    public function delete()
    {
        try {
            Course::destroy($this->id);

            $this->dispatch('notify', title: 'success', message: 'Customer deleted successfully.');

            $this->deleteCourseModal = false;

            $this->dispatch('dispatch-course-delete')->to(Table::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('notify', title: 'error', message: 'An error occurred.');
        }
    }

    public function render()
    {
        return view('livewire.admin.course.delete');
    }
}
