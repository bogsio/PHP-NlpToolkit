PHP-NlpToolkit
==============

PHP-NlpToolkit is a small toolkit for processing textual data. It provides common functionalities like: segmentation, tokenization and POS tagging.

```PHP
$text = new Text(" You can do a lot of interesting stuff with this toolkit. 
You can tokenize text, split ito sentences and tag words . ");

print_r($text->sentences());

$tok = $text->sentences()[0][0];

echo $tok;
echo $tok->tag();
echo $tok->word();

$tok = $text->sentences()[1][6];
print_r($tok->suggest()); // ito

```

The output:
```PHP
Array
(
    [0] => Array
        (
            [0] => NlpToolkit\Token Object
                (
                    [tag:protected] => PRP
                    [word:protected] => You
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 0
                )

            [1] => NlpToolkit\Token Object
                (
                    [tag:protected] => MD
                    [word:protected] => can
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 1
                )

            [2] => NlpToolkit\Token Object
                (
                    [tag:protected] => VBP
                    [word:protected] => do
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 2
                )

            [3] => NlpToolkit\Token Object
                (
                    [tag:protected] => DT
                    [word:protected] => a
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 3
                )

            [4] => NlpToolkit\Token Object
                (
                    [tag:protected] => NN
                    [word:protected] => lot
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 4
                )

            [5] => NlpToolkit\Token Object
                (
                    [tag:protected] => IN
                    [word:protected] => of
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 5
                )

            [6] => NlpToolkit\Token Object
                (
                    [tag:protected] => JJ
                    [word:protected] => interesting
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 6
                )

            [7] => NlpToolkit\Token Object
                (
                    [tag:protected] => NN
                    [word:protected] => stuff
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 7
                )

            [8] => NlpToolkit\Token Object
                (
                    [tag:protected] => IN
                    [word:protected] => with
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 8
                )

            [9] => NlpToolkit\Token Object
                (
                    [tag:protected] => DT
                    [word:protected] => this
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 9
                )

            [10] => NlpToolkit\Token Object
                (
                    [tag:protected] => NN
                    [word:protected] => toolkit
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 10
                )

            [11] => NlpToolkit\Token Object
                (
                    [tag:protected] => .
                    [word:protected] => .
                    [sentenceOffset:protected] => 0
                    [wordOffset:protected] => 11
                )

        )

    [1] => Array
        (
            [0] => NlpToolkit\Token Object
                (
                    [tag:protected] => PRP
                    [word:protected] => You
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 0
                )

            [1] => NlpToolkit\Token Object
                (
                    [tag:protected] => MD
                    [word:protected] => can
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 1
                )

            [2] => NlpToolkit\Token Object
                (
                    [tag:protected] => NN
                    [word:protected] => tokenize
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 2
                )

            [3] => NlpToolkit\Token Object
                (
                    [tag:protected] => NN
                    [word:protected] => text
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 3
                )

            [4] => NlpToolkit\Token Object
                (
                    [tag:protected] => ,
                    [word:protected] => ,
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 4
                )

            [5] => NlpToolkit\Token Object
                (
                    [tag:protected] => NN
                    [word:protected] => split
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 5
                )

            [6] => NlpToolkit\Token Object
                (
                    [tag:protected] => IN
                    [word:protected] => into
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 6
                )

            [7] => NlpToolkit\Token Object
                (
                    [tag:protected] => NNS
                    [word:protected] => sentences
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 7
                )

            [8] => NlpToolkit\Token Object
                (
                    [tag:protected] => CC
                    [word:protected] => and
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 8
                )

            [9] => NlpToolkit\Token Object
                (
                    [tag:protected] => NN
                    [word:protected] => tag
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 9
                )

            [10] => NlpToolkit\Token Object
                (
                    [tag:protected] => NNS
                    [word:protected] => words
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 10
                )

            [11] => NlpToolkit\Token Object
                (
                    [tag:protected] => .
                    [word:protected] => .
                    [sentenceOffset:protected] => 1
                    [wordOffset:protected] => 11
                )

        )

)

You/PRP

PRP

You

Array ( [0] => Array ( [word] => to [confidence] => 0.66575634141826 ) [1] => Array ( [word] => it [confidence] => 0.24719959266802 ) [2] => Array ( [word] => into [confidence] => 0.049157563414183 ) [3] => Array ( [word] => its [confidence] => 0.037840214775042 ) [4] => Array ( [word] => iso [confidence] => 4.6287724495464E-5 ) ) 

```

Features
--------

- Tokenization (splitting text into words)
- Segmentation (splitting text into sentences)
- PartOfSpeech Tagging
- Spellchecker
