<?php

function getQuestions() {
    static $questions;

    return $questions ? $questions : include CORE . '/questions.php';
}

function isRightAnswer($questionID, $answerID) {
    $questions = getQuestions();
	
	if (is_array($questions[$questionID]['right'])) {
        return in_array($answerID + 1, $questions[$questionID]['right']);
	} 

	return $questions[$questionID]['right'] == $answerID + 1;
}

function getMark($points) {
    $points = (float) $points;
	return round($points / (totalPoints() / 100) / 10);
}

function totalPoints() {
    $questions = getQuestions();
	static $points;
	
	return $points ? $points : $points = array_reduce($questions, function($sum, $question) {
		return $sum + $question['points'];
	}, 0);
}

function getResultTitle($mark) {
	if ($mark == 10)
        return 'Отлично! Но так не интересно :(';
	else if ($mark == 9)
		return 'Почти! Ах, обидно';
	else if ($mark >= 7)
        return 'И так сойдёт';
	else if ($mark > 5)
		return 'Можно лучше';
	else if ($mark == 5)
		return 'На грани';
	else if ($mark <= 5)
		return 'Не ожидаааааал';
}