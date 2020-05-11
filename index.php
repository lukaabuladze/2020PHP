<?php 
include 'database.php';

$result = mysqli_query($link, 'SELECT * FROM words');
//$words = mysqli_fetch_assoc($result);

$randwords = ['ძაღლი', 'თაგვი', 'ბილიკი', 'მაცივარი', 'ხელი', 'მხარი', 'ბურთი'];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$res = [];
	
	while($row = mysqli_fetch_assoc($result)){


		if(!empty($_POST[$row['id']])){
			if($_POST[$row['id']] == $row['definition_ge']){
				$res[$row['word']] = 'სწორია';
			}
			else{
				$res[$row['word']] = 'არ არის სწორი';
			}
		}
		else{
			echo '<div>სიტყვა '.$row['word'].' მნიშვნელობა არ არის არჩეული</div>';
		}

		
	}


}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>

	<form method="post" action="">
	<?php 

	while($row = mysqli_fetch_assoc($result)){
	?>

	<div>
		<strong><?=$row['word']?></strong> სიტყვის მნიშვნელობაა?
		<br>
		<input type="radio" name="<?=$row['id']?>" value="<?=$row['definition_ge']?>"> <?=$row['definition_ge']?>
		<input type="radio" name="<?=$row['id']?>" value="<?$randwords[rand(0, count($randwords)-1)]?>"> <?=$randwords[rand(0, count($randwords)-1)]?>
	</div>

	<?php
	}


	?>

	<input type="submit" name="submittest" value="Done">
	<a href="index.php">თავიდან</a> <br>
	<a href="add.php">სიტყვის დამატება</a>

	</form>

	<?php 
	$i = 0;
	if($_POST){
		foreach($res as $k => $r){
			
			echo '<h3>'.$k.' -- '.$r .' </h3>';
		}
	}

	 ?>

</body>
</html>