<?php

namespace App\Livewire\Admin\Subject;

use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\Admin\Subject\SubjectForm;

class EditSubject extends Component
{
    public SubjectForm $form;

    public $editSubjectModal = false;

    #[On('dispatch-subject-edit')]
    public function showEditSubjectModal(Subject $id)
    {
        $this->form->setSubject($id);

        $this->editSubjectModal = true;
    }

    public function render()
    {
        return view('livewire.admin.subject.edit-subject', [
            'courses' => Course::select('id', 'name', 'year')
                ->whereIn('id', function ($query) {
                    $query->selectRaw('MIN(id)')
                        ->from('courses')
                        ->groupBy('name', 'year');
                })
                ->orderBy('name')
                ->orderBy('year')
                ->get()
        ]);
    }
}
