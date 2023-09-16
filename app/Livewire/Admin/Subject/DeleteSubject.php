<?php

namespace App\Livewire\Admin\Subject;

use App\Models\Subject;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteSubject extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $subject_title;

    public $deleteSubjectModal = false;

    #[On('dispatch-subject-delete')]
    public function showDeleteSubjectModal($id, $subject_title)
    {
        $this->id = $id;
        $this->subject_title = $subject_title;

        $this->deleteSubjectModal = true;
    }

    public function delete(Subject $subject)
    {
        try {
            $subject->destroy($this->id);

            $this->dispatch('notify', title: 'success', message: 'Course deleted successfully.');

            $this->deleteSubjectModal = false;

            $this->dispatch('dispatch-subject-delete')->to(SubjectTable::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('notify', title: 'error', message: 'An error occurred.');
        }
    }

    public function render()
    {
        return view('livewire.admin.subject.delete-subject');
    }
}
