<?php
	session_start();
?>

<html>
<head>   
<link href="Kalendarz.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="addEvent">

	<?php
		$rok1 = $_SESSION['currY'];
		$day=$_GET['day']-1;
		$month=$_GET['month'];
		$_SESSION['dzien']=$day;
		$_SESSION['miesiac']=$month;
		echo '<h2><b>Zaplanuj czas na: '.$day.'.'.$month.'.'.$rok1.':</b></h2><br><br>';
	?>




	<form method="post" action="dodawanie.php">
		Godzina: <input type="time" name="godzina"><br><br>
		Nazwa wydarzenia: <input type="text" name="tytul"><br><br>
		Opis wydarzenia: <input type="text" name="opis"><br><br>
		<input type="checkbox" name="rekurencja" value="1" > Cotygodniowe<br><br>
		<input  class="back" type="submit" name="submit" value="ZAPLANUJ"><br><br>

	</form>

	<br><br>
	
	<?php 
		echo '<a class="back" href="index.php?month='.$month.'">Powrót do kalendarza</a>';
	?>


</div>



</body>
</html>    
