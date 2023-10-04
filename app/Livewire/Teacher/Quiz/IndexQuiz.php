<?php

namespace App\Livewire\Teacher\Quiz;

use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexQuiz extends Component
{
    public $chooseQuizType = false;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.teacher.quiz.index-quiz');
    }

    public function createQuestionLists()
    {
        return $this->redirect(route('teacher.create-quiz'), true);
    }
}
