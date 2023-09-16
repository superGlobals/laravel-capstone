<?php

namespace App\Livewire\Admin\Subject;

use App\Livewire\Forms\Admin\Subject\SubjectForm;
use App\Models\Subject;
use Livewire\Attributes\On;
use Livewire\Component;

class SubjectTable extends Component
{
    public SubjectForm $form;

    public $paginate = 5;

    #[On('dispatch-subject-save')]
    #[On('dispatch-subject-edit')]
    #[On('dispatch-subject-delete')]
    public function render()
    {
        return view('livewire.admin.subject.subject-table', [
            'subjects' => Subject::search($this->form->search)
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate)
        ]);
    }
}
