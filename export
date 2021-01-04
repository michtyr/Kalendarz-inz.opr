<?php  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "calendar";

  $conn = new mysqli($servername, $username, $password, $dbname);
  $conn -> query("SET NAMES 'utf8'");

  $output = '';

if(isset($_POST["export"]))
{
  $sql = "SELECT * FROM events";
  $result = $conn -> query($sql);
  $ics_data = "BEGIN:VCALENDAR\n";
  $ics_data .= "VERSION:2.0\n";
  $ics_data .= "PRODID:-//Google Inc//Google Calendar 70.9054//EN\n";



  while($row = $result -> fetch_assoc())
  {
      $id = $row['id'];
      $dzien = $row['dzien'];
      $miesiac = $row['miesiac'];
      $rok = $row['rok'];
      $czas = $row['godzina'];
      $tytul = $row['tytul'];
      $opis = $row['opis'];
      $czas1 = date("His", strtotime($czas));

      $ics_data .= "BEGIN:VEVENT\n";
      $ics_data .= "DTSTART;TZID=Europe/Warsaw:" . $rok . $miesiac . $dzien . "T" . $czas1 . "Z\n";
      $ics_data .= "DESCRIPTION:" . $opis . "\n";
      $ics_data .= "SUMMARY:" . $tytul . "\n";
      $ics_data .= "UID:" . $id . "\n";
      $ics_data .= "END:VEVENT\n";
  }
  $ics_data .= "END:VCALENDAR\n";

  # Download the File
  $filename = "event_calendar.ics";
  header("Content-type:text/calendar");
  header("Content-Disposition: attachment; filename=$filename");
  echo $ics_data;
  exit;
}

?>
