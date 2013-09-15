<?php

// no direct access
defined('_JEXEC') or die('Fatal Error');

$phCode = $params->get('phCode');
$phCleanJS = $params->get('phCleanJS');
$phCleanCSS = $params->get('phCleanCSS');
$phCleanAll = $params->get('phCleanAll');
$regExMatched = null;

if (!$phCleanAll) {
	if ($phCleanJS) {
		preg_match("/<script(.*)>(.*)<\/script>/i", $phCode, $regExMatches);
		if ($regExMatches) {
			foreach ($regExMatches as $i=>$regExMatch) {
				$cleanedMatch = str_replace('<br />', '', $regExMatch);
				$phCode = str_replace($regExMatch, $cleanedMatch, $phCode);
			}
		}
	}
	if ($phCleanCSS) {
		preg_match("/<style(.*)>(.*)<\/style>/i", $phCode, $regExMatches);
		if ($regExMatches) {
			foreach ($regExMatches as $i=>$regExMatch) {
				$cleanedMatch = str_replace('<br />', '', $regExMatch);
				$phCode = str_replace($regExMatch, $cleanedMatch, $phCode);
			}
		}
	}
} else {
	$phCode = str_replace('<br />', '', $phCode);
}

echo $phCode;

?>
