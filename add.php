<?php 

include 'database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

	$word = $_POST['word_eng'];
	$word_ge = $_POST['word_def_ge'];

	if(strlen($word) < 2 || strlen($word) > 50){
		echo 'word length is not valid';
	}
	else if(strlen($word_ge) < 2 || strlen($word_ge) > 50){
		echo 'word length is not valid';
	}
	else{
		$word = mysqli_real_escape_string($link, $word);
		$word_ge = mysqli_real_escape_string($link, $word_ge);

		$query = 'INSERT INTO `words` (word, definition_ge) VALUES ("'.$word.'", "'.$word_ge.'")';
		
		if(mysqli_query($link, $query)){
			echo '<h2>Saved</h2>';
		}
		else{
			echo '<h2>There was an error</h2>';
		}

	}



}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add a word</title>
</head>
<body>

	<form method="post" action="">
		<div>
			<label for="wordEng"></label>
			<input id="wordEng" type="text" name="word_eng" placeholder="Enter english word">
		</div>

		<div>
			<label for="wordGe"></label>
			<input id="wordGe" type="text" name="word_def_ge" placeholder="Enter georgian definition">
		</div>

		<input type="submit" name="save_word" value="Save">
		<br>
		<a href="index.php">ტესტი</a>
	</form>

</body>
</html>