<?php

use App\Models\Question;

function getQuestionName($id) {
    // return 'Done';
    $q = Question::select('question')->find($id);
    return $q->question;
}
