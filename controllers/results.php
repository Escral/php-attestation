<?php

global $resultFile;

$resultFile = RESULTS . '/results.xml';
$questions = getQuestions();

function getAttempts() {
    global $resultFile;
    
	if (! file_exists($resultFile))
		return 0;
	
	$xml = simplexml_load_file($resultFile);

	return $xml->attempt;
}

$attempts = getAttempts(); 

if (isset($_GET['attempt'])) {
	$attemptNumber = $_GET['attempt'] - 1;

	if (isset($attempts[$attemptNumber])) {
        $attempt = $attempts[$attemptNumber];
	}
}

return compact('questions', 'attempts', 'attempt');