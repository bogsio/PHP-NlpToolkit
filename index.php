<html>
<head>
<style>
#text-input{
	width: 400px;
	height: 200px;
}

.token{
	background-color: lightgray;
}

.sentence{
	border-style: dotted;
	border-width: 2px;
	padding: 10px;
	margin: 20px;
}

</style>
</head>

<body>

<form method="POST">
<p><label for="text">Text:</label></p>
<p>
	<textarea id="text-input" name="text"></textarea>
</p>
<p>
	<input type="submit" />
</p>
</form>

<?php
require_once('autoload.php');
use \NlpToolkit\Text;

if (isset($_POST['text'])){
	$text = new Text($_POST['text']);
?>

<?php foreach($text->sentences() as $sentence): ?>
	<div class="sentence">
		<?php foreach($sentence as $token): ?>
			<span class="token"><?php echo $token ?></span>
		<?php endforeach ?>
	</div>
<?php endforeach ?>

<?php foreach($text->tokens() as $token): ?>
	<div>
		<span class="token"><?php echo $token ?>
			/ Suggestions:
			<?php echo implode(array_map(function($t){
				return '"' . $t['word'] . '"(' . $t['confidence'] .')';
			}, $token->suggest()), ',');?>
		</span>
	</div>
<?php endforeach ?>

<?php
}
?>

</body>
</html>