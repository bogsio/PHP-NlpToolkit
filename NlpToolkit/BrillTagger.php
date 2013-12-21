<?php
namespace NlpToolkit;

/**
 * Thanks to: http://phpir.com/part-of-speech-tagging
 */
class BrillTagger implements ITagger{
	private $dict;
	
	public function __construct($lexicon) {
		$fh = fopen($lexicon, 'r');
		while($line = fgets($fh)) {
				$tags = explode(' ', $line);
				$this->dict[trim(strtolower(array_shift($tags)))] = $tags;
		}
		fclose($fh);
	}
	
	public function tag($tokens) {
		$nouns = array('NN', 'NNS');
		
		$return = array();
		$i = 0;
		foreach($tokens as $token) {
			// default to a common noun
			$return[$i] = array('word' => $token, 'tag' => 'NN');  
			
			// get from dict if set
			if(isset($this->dict[trim(strtolower($token))])) {
				$return[$i]['tag'] = trim($this->dict[trim(strtolower($token))][0]);
			}       
			
			// Converts verbs after 'the' to nouns
			if($i > 0) {
				if($return[$i - 1]['tag'] == 'DT' && 
					in_array($return[$i]['tag'], 
									array('VBD', 'VBP', 'VB'))) {
					$return[$i]['tag'] = 'NN';
				}
			}
			
			// Convert noun to number if . appears
			if($return[$i]['tag'][0] == 'N' && strpos($token, '.') !== false) {
				$return[$i]['tag'] = 'CD';
			}
			
			// Convert noun to past particile if ends with 'ed'
			if($return[$i]['tag'][0] == 'N' && substr($token, -2) == 'ed') {
				$return[$i]['tag'] = 'VBN';
			}
			
			// Anything that ends 'ly' is an adverb
			if(substr($token, -2) == 'ly') {
				$return[$i]['tag'] = 'RB';
			}
			
			// Common noun to adjective if it ends with al
			if(in_array($return[$i]['tag'], $nouns) 
					&& substr($token, -2) == 'al') {
				$return[$i]['tag'] = 'JJ';
			}
			
			// Noun to verb if the word before is 'would'
			if($i > 0) {
				if($return[$i]['tag'] == 'NN' && $i > 0 && isset($return[$i-1]['token'])
						&& trim(strtolower($return[$i-1]['token'])) == 'would') {
					$return[$i]['tag'] = 'VB';
				}
			}
			
			// Convert noun to plural if it ends with an s
			if($return[$i]['tag'] == 'NN' && substr($token, -1) == 's') {
				$return[$i]['tag'] = 'NNS';
			}
			
			// Convert common noun to gerund
			if(in_array($return[$i]['tag'], $nouns) 
					&& substr($token, -3) == 'ing') {
				$return[$i]['tag'] = 'VBG';
			}
			
			// If we get noun noun, and the second can be a verb, convert to verb
			if($i > 0) {
				if(in_array($return[$i]['tag'], $nouns) 
						&& in_array($return[$i-1]['tag'], $nouns) 
						&& isset($this->dict[trim(strtolower($token))])) {
					if(in_array('VBN', $this->dict[trim(strtolower($token))])) {
						$return[$i]['tag'] = 'VBN';
					} else if(in_array('VBZ', 
								$this->dict[trim(strtolower($token))])) {
						$return[$i]['tag'] = 'VBZ';
					}
				}
			}
			
			$i++;
		}
		return $return;
	}
}
?>