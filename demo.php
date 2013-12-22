<?php
require_once('autoload.php');
use \NlpToolkit\Text;


echo '<pre>';
$text = new Text(" You can do a lot of interesting stuff with this toolkit. 
You can tokenize text, split ito sentences and tag words . ");

echo "Number of sentences: " . count($text->sentences()) . "\n";

$tok = $text->sentences()[0][0];

echo "Token: " . $tok . "\n";
echo "Tag: " . $tok->tag() . "\n";
echo "Word: " . $tok->word() . "\n";

$tok = $text->sentences()[1][6]; // ito
print_r($tok->suggest()); 
echo '</pre>';
?>