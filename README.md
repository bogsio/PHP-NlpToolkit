PHP-NlpToolkit
==============

PHP-NlpToolkit is a small toolkit for processing textual data. It provides common functionalities like: segmentation, tokenization and POS tagging.

```PHP
$text = new Text(" You can do a lot of interesting stuff with this toolkit. 
You can tokenize text, split ito sentences and tag words . ");

echo "Number of sentences: " . count($text->sentences()) . "\n";

$tok = $text->sentences()[0][0];

echo "Token: " . $tok . "\n";
echo "Tag: " . $tok->tag() . "\n";
echo "Word: " . $tok->word() . "\n";

$tok = $text->sentences()[1][6]; // ito
print_r($tok->suggest());

```

The output:
```PHP
Number of sentences: 2
Token: You/PRP
Tag: PRP
Word: You
Array
(
    [0] => Array
        (
            [word] => to
            [confidence] => 0.66575634141826
        )

    [1] => Array
        (
            [word] => it
            [confidence] => 0.24719959266802
        )

    [2] => Array
        (
            [word] => into
            [confidence] => 0.049157563414183
        )

    [3] => Array
        (
            [word] => its
            [confidence] => 0.037840214775042
        )

    [4] => Array
        (
            [word] => iso
            [confidence] => 4.6287724495464E-5
        )

)
```

Features
--------

- Tokenization (splitting text into words)
- Segmentation (splitting text into sentences)
- PartOfSpeech Tagging
- Spellchecker
