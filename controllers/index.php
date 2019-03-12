<?php

global $resultFile;

$resultFile = RESULTS . '/results.xml';
$questions = getQuestions();

function calculateResult($points) {
    $mark = getMark($points);
	
	return [
		'title' => getResultTitle($mark),
		'mark' => $mark,
		'points' => $points,
	];
}

function getAttempts() {
    global $resultFile;
    
	if (! file_exists($resultFile))
		return 0;
	
	$xml = simplexml_load_file($resultFile);

	return count($xml->attempt);
}

function xmlDocument($simpleXMLElement)
{
    $xmlDocument = new DOMDocument('1.0');
    $xmlDocument->preserveWhiteSpace = false;
    $xmlDocument->formatOutput = true;
    $xmlDocument->loadXML($simpleXMLElement->asXML());

    return $xmlDocument;
}

if (isset($_POST['answer'])) {
    $answers = $_POST['answer'];
    $points = 0;
	
	if (file_exists($resultFile)) {
		$xml = simplexml_load_file($resultFile);
	} else {
		$xml = new SimpleXMLElement("<results></results>");
	}

	$attempt = $xml->addChild('attempt');
    $attempt->addAttribute('timestamp', time());

    foreach ($answers as $questionID => $answerID) {
		$question = $attempt->addChild('question');
        $question->addAttribute('id', $questionID);

		if (is_array($answerID)) {
			foreach ($answerID as $ID) {
				$answer = $question->addChild('answer', $ID);

				if (isRightAnswer($questionID, $ID)) {
					$points += $questions[$questionID]['points'] / count($questions[$questionID]['right']);
					$answer->addAttribute('right', true);
				} else {
					$points -= ($questions[$questionID]['points'] / count($questions[$questionID]['right'])) / 2;
				}
			}
		} else {
			$answer = $question->addChild('answer', $answerID);

			if (isRightAnswer($questionID, $answerID)) {
				$points += $questions[$questionID]['points'];
				$answer->addAttribute('right', true);
			}
		}
	}

    $attempt->addAttribute('points', $points);

	$doc = xmlDocument($xml);
    $doc->save($resultFile);
	
	$result = calculateResult($points);
    $totalPoints = totalPoints();

    $attempts = getAttempts(); 
}

return compact('questions', 'points', 'totalPoints', 'result', 'attempts');