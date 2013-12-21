<?php
namespace NlpToolkit;

class RegexSentenceTokenizer implements ITokenizer{
	/**
	*See: http://stackoverflow.com/questions/5032210/php-sentence-boundaries-detection
	*/
	
	public $regex = '/# Split sentences on whitespace between them.
    (?<=                # Begin positive lookbehind.
      [.!?]             # Either an end of sentence punct,
    | [.!?][\'"]        # or end of sentence punct and quote.
    )                   # End positive lookbehind.
    (?<!                # Begin negative lookbehind.
      Mr\.              # Skip either "Mr."
    | Mrs\.             # or "Mrs.",
    | Ms\.              # or "Ms.",
    | Jr\.              # or "Jr.",
    | Dr\.              # or "Dr.",
    | Prof\.            # or "Prof.",
    | Sr\.              # or "Sr.",
    | T\.V\.A\.         # or "T.V.A.",
                        # or... (you get the idea).
    )                   # End negative lookbehind.
    \s+                 # Split on whitespace between sentences.
    /ix';

	public function tokenize($text){
		$sentences = preg_split($this->regex, $text, -1, PREG_SPLIT_NO_EMPTY);
		return $sentences;
	}
}

?>