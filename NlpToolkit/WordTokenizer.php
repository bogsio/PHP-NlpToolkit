<?php
namespace NlpToolkit;

class WordTokenizer implements ITokenizer{
	public function tokenize($text){
		preg_match_all("/Mr\.|Mrs\.|Ms\.|Jr\.|Dr\.|Prof\.|Sr\.|\w+|[^\w\s]+/", 
			$text, $tokens, PREG_PATTERN_ORDER);
		return $tokens[0];
	}
}

?>