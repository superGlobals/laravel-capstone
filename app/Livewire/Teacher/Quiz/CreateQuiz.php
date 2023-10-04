<?php

namespace App\Livewire\Teacher\Quiz;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateQuiz extends Component
{
    public $questionCount = 0;

    public $createTrueOrFalse = false;

    public $createMultipleChoice = false;

    public $multipleChoiceType = false;

    public $fillInTheBlankType = false;

    public $trueOrFalseType = false;

    public $questionType;

    public $tfNumberQuestion;

    public $mcNumberQuestion;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.teacher.quiz.create-quiz');
    }

    public function createTFQuestionLists()
    {
        $this->trueOrFalseType = true;

        $this->createTrueOrFalse = false;
    }

    public function createMultipleChoiceQuestionLists()
    {
        $this->multipleChoiceType = true;

        $this->createMultipleChoice = false;
    }

    public function addTFQuestion()
    {
        $this->tfNumberQuestion++;
    }

    public function removeTFQuestion()
    {
        $this->tfNumberQuestion--;
    }

    public function qwe()
    {
        dd('qwe');
    }
}
