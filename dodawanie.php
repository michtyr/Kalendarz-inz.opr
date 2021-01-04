<?php
		session_start();
		$rok = '"'.$_SESSION['currY'].'"';
		$rokS = $_SESSION['currY'];
		$godzina='"'.$_POST['godzina'].'"';
		$tytul='"'.$_POST['tytul'].'"';
		$opis='"'.$_POST['opis'].'"';
		$dzien=$_SESSION['dzien'];
		$miesiac=$_SESSION['miesiac'];
		$rekurencja=$_POST['rekurencja'];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "calendar";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn -> query("SET NAMES 'utf8'");
		if ($conn -> connect_error) { die("Nie połączono z bazą danych: " . $conn -> connect_error);}

		$sql = "SELECT id, dzien, miesiac, godzina, tytul, opis FROM events";
		$sql1 = "INSERT INTO events(dzien, miesiac, rok, godzina, tytul, opis) VALUES($dzien, $miesiac, $rok, $godzina, $tytul, $opis)";
		if ($conn->query($sql1) === TRUE)
		{
			while(($rekurencja==1)&&($dzien<=24))
			{
				$dzien=$dzien+7;
				$sql = "INSERT INTO events(dzien, miesiac, rok, godzina, tytul, opis) VALUES($dzien, $miesiac, $rok, $godzina, $tytul, $opis)";
				$conn->query($sql);
			}

			header('Location: index.php?month='.$miesiac.'&year='.$rokS);
			exit();
    		
		} else {
   		 echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
?>
