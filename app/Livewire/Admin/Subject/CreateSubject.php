<?php

namespace App\Livewire\Admin\Subject;

use App\Models\Course;
use Livewire\Component;
use App\Livewire\Forms\Admin\Subject\SubjectForm;
use Illuminate\Support\Facades\Log;

class CreateSubject extends Component
{
    public SubjectForm $form;

    public $createSubjectModal = false;

    public function saveSubject()
    {
        $this->validate();

        try {
            $this->form->store();

            $this->dispatch('notify', title: 'success', message: 'Subject created successfully.');

            $this->createSubjectModal = false;

            $this->dispatch('dispatch-subject-save')->to(SubjectTable::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('notify', title: 'error', message: 'An error occurred.');
        }
    }

    public function render()
    {
        return view('livewire.admin.subject.create-subject', [
            'courses' => Course::all()
        ]);
    }

    // public function render()
    // {
    //     return view('livewire.admin.subject.create-subject', [
    //         'courses' => Course::select('id', 'name', 'year', 'section')
    //             ->whereIn('id', function ($query) {
    //                 $query->selectRaw('MIN(id)')
    //                     ->from('courses')
    //                     ->groupBy('name', 'year');
    //             })
    //             ->orderBy('name')
    //             ->orderBy('year')
    //             ->get()
    //     ]);
    // }
}
